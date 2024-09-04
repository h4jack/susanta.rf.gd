<?php
// Include database connection
include_once "../../module/php/db.php";

// Function to insert a new user
function insertUsers($conn, $username, $password, $email) {
    if (is_uname($username) && is_email($email) && $password) {
        // Prepare the SQL statement
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";

        try {
            // Prepare the SQL statement
            $stmt = mysqli_prepare($conn, $sql);
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . mysqli_error($conn));
            }

            // Hash the password securely
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, 'sss', $username, $hashedPassword, $email);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return 0; // 0 indicates success
            } else {
                throw new Exception("Error executing query: " . mysqli_stmt_error($stmt));
            }
        } catch (Exception $e) {
            // Log the error and return a custom error code or message
            error_log($e->getMessage()); // Log the error for debugging
            return $e->getCode(); // Or use a custom error code or message
        }
    } else {
        return 1; // Return an error code indicating invalid input, no that is 1 ok..
    }
}

// Function to check if user exists by username or email
function userExists($conn, $username = "", $email = "") {
    // Initialize an array to store user details
    $userDetails = [];
    
    // Check if username is provided and valid
    if ($username && is_uname($username)) {
        $sql = "SELECT username FROM users WHERE username = ?;";
        try {
            $stmt = mysqli_prepare($conn, $sql);
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . mysqli_error($conn), mysqli_errno($conn));
            }

            mysqli_stmt_bind_param($stmt, 's', $username);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    $userDetails[] = $row; // Add found users to the array
                }
                mysqli_stmt_close($stmt);
            } else {
                throw new Exception("Error executing query: " . mysqli_stmt_error($stmt), mysqli_errno($conn));
            }
        } catch (Exception $e) {
            return ["error" => $e->getMessage(), "code" => $e->getCode()];
        }
    }

    // Check if email is provided and valid
    if ($email && is_email($email)) {
        $sql = "SELECT username FROM users WHERE email = ?;";
        try {
            $stmt = mysqli_prepare($conn, $sql);
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . mysqli_error($conn), mysqli_errno($conn));
            }

            mysqli_stmt_bind_param($stmt, 's', $email);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    $userDetails[] = $row; // Add found users to the array
                }
                mysqli_stmt_close($stmt);
            } else {
                throw new Exception("Error executing query: " . mysqli_stmt_error($stmt), mysqli_errno($conn));
            }
        } catch (Exception $e) {
            return ["error" => $e->getMessage(), "code" => $e->getCode()];
        }
    }

    // Check if any users were found
    if (count($userDetails) > 0) {
        return 1;
    }else{
        return 0;
    }

    // If no valid username or email was provided or no users found
    return ["error" => "No valid username or email provided or no user found", "code" => 400];
}

// Function to update user information
function updateUser($conn, $username, $password = null, $email = null) {
    if ($username) {
        $sql = "UPDATE users SET";
        $params = [];
        $types = '';

        if ($password) {
            $sql .= " password = ?,";
            $params[] = password_hash($password, PASSWORD_DEFAULT);
            $types .= 's';
        }

        if ($email) {
            $sql .= " email = ? ";
            $params[] = $email;
            $types .= 's';
        } else {
            $sql = rtrim($sql, ',') . " ";
        }

        $sql .= "WHERE username = ?;";
        $params[] = $username;
        $types .= 's';

        try {
            $stmt = mysqli_prepare($conn, $sql);
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . mysqli_error($conn));
            }
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return 0; // 0 indicates success
            } else {
                throw new Exception("Error executing query: " . mysqli_stmt_error($stmt));
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $e->getCode();
        }
    }
    return 1; // Invalid input
}

// Function to delete a user
function deleteUser($conn, $username) {
    if ($username) {
        $sql = "DELETE FROM users WHERE username = ?;";
        try {
            $stmt = mysqli_prepare($conn, $sql);
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . mysqli_error($conn));
            }
            mysqli_stmt_bind_param($stmt, 's', $username);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return 0; // 0 indicates success
            } else {
                throw new Exception("Error executing query: " . mysqli_stmt_error($stmt));
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $e->getCode();
        }
    }
    return 1; // Invalid input
}

function handleFormSubmission($conn)
{
    // Check if required POST variables are set
    if (isset($_POST["username"], $_POST["password"], $_POST["vpassword"], $_POST["email"])) {
        $username = trim($_POST["username"]);
        $password = $_POST["password"];
        $vpassword = $_POST["vpassword"];
        $email = trim($_POST["email"]);

        // Check if passwords match
        if ($password === $vpassword) {
            // Validate username and email
            if (is_uname($username) && is_email($email)) {
                // Insert the new user
                $ecode = insertUsers($conn, $username, $password, $email);
                switch ($ecode) {
                    case 0:
                        echo "User registered successfully.";
                        return 1;
                        break;
                    case 1062: // Duplicate entry error code
                        if (userExists($conn, $username)) {
                            echo "User already exists with that username.";
                        } elseif (userExists($conn, '', $email)) {
                            echo "User already exists with that email.";
                        }
                        break;
                    default:
                        echo "An error occurred: Code " . $ecode;
                        break;
                }
            } else {
                echo "Invalid username or email format.";
            }
        } else {
            echo "Passwords do not match.";
        }
    } else {
        echo "Please provide all required details.";
    }
    return 0;
}
?>
