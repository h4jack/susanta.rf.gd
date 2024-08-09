<?php
include_once "../../module/php/db.php";
include_once "../../module/php/user_functions.php";
include_once "../../module/php/string.php";

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

// Connect to the database
$conn = connect_db("susanta");

// Create the users table if it doesn't exist
createUserTable($conn);

// Get the redirect URL from the hidden field
$redirectUrl = isset($_POST['redir']) ? filter_var($_POST['redir'], FILTER_SANITIZE_URL) : 'susantamandi.in';


if (isAllowedDomain($redirectUrl))
    if (handleFormSubmission($conn))
        header("Location: $redirectUrl");

?>


<?php
require_once "../../module/html/main.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HomePage</title>
    <?php
    $paths = array(
        "/module/css/header.css",
        "/module/css/main.css",
        "/module/css/all.css",
        "/module/css/menubar.css",
        "/module/css/sign_form.css",
        "/module/css/footer.css",
        "/style.css"
    );

    // Define the function before calling it
    link_css($paths);
    ?>
</head>

<body>
    <?php
    echo print_head("myusername", "Login");
    $paths = array(
        "/module/js/header.js"
    );
    echo link_script($paths);
    ?>
    <!-- Main Content Area -->
    <main>
        <section class="page-content">
        </section>

    </main>
    <?php
    echo print_footer();
    ?>
</body>

</html>