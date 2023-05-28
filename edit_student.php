<?php
// Include the database connection file
include 'db_connection.php';

// Check if the student ID is provided in the URL
if (isset($_GET['id'])) {
  $studentId = $_GET['id'];

  // Fetch the student details from the database
  $result = $conn->query("SELECT * FROM students WHERE id = $studentId");

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Retrieve the form data
      $name = $_POST['name'];
      $rollNumber = $_POST['roll_number'];
      $department = $_POST['department'];
      $hostel = $_POST['hostel'];

      // Update the student record in the database
      $sql = "UPDATE students SET name='$name', roll_number='$rollNumber',
              department='$department', hostel='$hostel' WHERE id=$studentId";

      if ($conn->query($sql) === TRUE) {
        // Redirect back to the landing page
        header("Location: index.php");
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  } else {
    echo "Student not found.";
  }
} else {
  echo "Student ID not provided.";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Student Details</title>
  <!-- Include any external dependencies here -->
  <!-- Add CSS styles, JavaScript libraries, etc. -->
</head>
<body bgcolor="teal">
  <h1 align=center>Edit Student Details</h1>
  <h2 > FILL BELOW DETAILS:</h2>

 
  <a href="index.php"><input type ='submit' value='back' class ='back'></a><br><br>
  
  
  <?php if ($result->num_rows == 1) { ?>
    <form method="POST"  action="<?php echo $_SERVER["PHP_SELF"] . "?id=" . $studentId; ?>">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required><br><br>
  
      <label for="roll_number">Roll Number:</label>
      <input type="text" name="roll_number" id="roll_number" value="<?php echo $row['roll_number']; ?>" required><br><br>
  
      <label for="department">Department:</label>
      <input type="text" name="department" id="department" value="<?php echo $row['department']; ?>" required><br><br>
  
      <label for="hostel">Hostel:</label>
      <input type="text" name="hostel" id="hostel" value="<?php echo $row['hostel']; ?>" required><br><br>

      <input type="submit" value="update details" name="update">
  
     
    </form>
  <?php } ?>
</body>
</html>
