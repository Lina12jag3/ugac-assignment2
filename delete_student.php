<?php
// Include the database connection file
include 'db_connection.php';

// Check if the student ID is provided in the URL
if (isset($_GET['id'])) {
  $studentId = $_GET['id'];

  // Delete the student record from the database
  $sql = "DELETE FROM students WHERE id=$studentId";

  if ($conn->query($sql) === TRUE) {
    // Redirect back to the landing page
    header("Location: index.php");
    exit();
  } else {
    echo "Error deleting student: " . $conn->error;
  }
} else {
  echo "Student ID not provided.";
}
?>
