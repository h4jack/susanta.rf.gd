<?php
// Database connection parameters
define('DB_HOST', 'localhost');
define('DB_PORT', 3308);
define('DB_USER', 'root');
define('DB_PASSWORD', 'asdf');

/**
 * Connect to the MySQL database.
 *
 * @return mysqli The database connection.
 */
function connect_db($database)
{
    // Connect to MySQL server
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, port: DB_PORT);

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
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, $database, port: DB_PORT);

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

function createUserTable($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    username VARCHAR(30) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password CHAR(64) NOT NULL,
    name VARCHAR(100),
    phone VARCHAR(20),
    gender INT CHECK (gender IN (1, 2, 3)), -- Consistent case
    dob DATE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    up_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);
";

    return mysqli_query($conn, $sql);
}

/**
 * Sanitize input data to prevent SQL injection.
 *
 * @param mysqli $conn The database connection.
 * @param string $data The data to sanitize.
 * @return string The sanitized data.
 */
function sanitize_input($conn, $data)
{
    return mysqli_real_escape_string($conn, trim($data));
}

/**
 * Close the database connection.
 *
 * @param mysqli $conn The database connection.
 */
function close_db($conn)
{
    return mysqli_close($conn);
}
