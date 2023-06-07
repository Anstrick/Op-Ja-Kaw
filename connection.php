<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "opjakaw";

if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass)) {
    die("Failed to connect!");
}

$create_db = "CREATE DATABASE IF NOT EXISTS opjakaw";
if ($conn->query($create_db) === TRUE) {
    echo "Database created successfully<br>";
} else {
    die("Error creating database: " . $conn->error);
}

if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("Failed to connect!");
}

$create_table = "CREATE TABLE IF NOT EXISTS users (
    id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(30) UNIQUE,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL
)";

if (!$conn->query($create_table)){
    die("Error creating table: " . $conn->error);
}

$create_table = "CREATE TABLE IF NOT EXISTS forum (
    forum_id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    forum_title VARCHAR(255) NOT NULL,
    forum_content VARCHAR(255) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($create_table)) {
    die("Error creating table: " . $conn->error);
}

?>
