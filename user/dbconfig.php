<?php
// This file is a general database configuration for php files under this directory

// database owner information
$servername = "localhost";
$dbusername = "root";
$dbpassword = "000000";
$dbname = "bigbang";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>