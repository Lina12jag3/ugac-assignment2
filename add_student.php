<?php

include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $name = $_POST['name'];
  $rollNumber = $_POST['roll_number'];
  $department = $_POST['department'];
  $hostel = $_POST['hostel'];

  // Insert the new student into the database
  $sql = "INSERT INTO students (name, roll_number, department, hostel)
          VALUES ('$name', '$rollNumber', '$department', '$hostel')";

  if ($conn->query($sql) === TRUE) {
    
    header("Location: index.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New Student</title>
  
</head>
<body bgcolor="teal">
  <h1 ><center>Add New Student</center></h1>
  <a href="index.php"><input type ='submit' value='back' class ='back'></a>
  
  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="name"><h3>Name:</h3></label>
    <input type="text" name="name" id="name" required><br>
  
    <label for="roll_number"><h3>Roll Number:</h3></label>
    <input type="text" name="roll_number" id="roll_number" required>
  
    <label for="department"><h3>Department:</h3></label>
    <input type="text" name="department" id="department" required><br>
  
    <label for="hostel"><h3>Hostel:</h3></label>
    <input type="text" name="hostel" id="hostel" required><br><br>
  
    <input type="submit" value="Add Student">
  </form>
</body>
</html>
