<?php
// Database connection parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'susanta'); // You can set a default database here if desired

/**
 * Connect to the MySQL database.
 *
 * @return mysqli The database connection.
 */
function connect_db($database) {
    // Connect to MySQL server
    $conn = mysqli_connect("localhost", "root", "");

    // Check connection to the server
    if (!$conn) {
        die("[Connection failed] : " . mysqli_connect_error());
    }

    // Create database if it does not exist
    $sql = "CREATE DATABASE IF NOT EXISTS `$database`";
    if (!mysqli_query($conn, $sql)) {
        die("[Error creating database] : " . mysqli_error($conn));
    }

    // Close connection to the MySQL server
    mysqli_close($conn);

    // Connect to the specified database
    $conn = mysqli_connect("localhost", "root", "", $database);

    // Check connection to the specified database
    if (!$conn) {
        die("[Connection failed] : " . mysqli_connect_error());
    }

    return $conn;
}

/**
 * Create the 'users' table if it does not exist.
 *
 * @param mysqli $conn The database connection.
 * @return bool True if the table was created successfully, false otherwise.
 */
function createUserTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(9) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        reg_date DATE NOT NULL DEFAULT CURRENT_DATE,
        up_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );";

    return mysqli_query($conn, $sql);
}

/**
 * Sanitize input data to prevent SQL injection.
 *
 * @param mysqli $conn The database connection.
 * @param string $data The data to sanitize.
 * @return string The sanitized data.
 */
function sanitize_input($conn, $data) {
    return mysqli_real_escape_string($conn, trim($data));
}

/**
 * Close the database connection.
 *
 * @param mysqli $conn The database connection.
 */
function close_db($conn) {
    mysqli_close($conn);
}
?>
