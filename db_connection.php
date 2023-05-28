<?php
// Database configuration
$servername = "localhost";
$username = "lina";
$password = "12345678";
$dbname = "student_db";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
