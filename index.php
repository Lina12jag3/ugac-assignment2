<?php

include 'db_connection.php';


$students = $conn->query("SELECT * FROM students");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Information Management System</title>
  
  
  <style>
  #header{
      height: 10%;
      width:100% ;
      top:2;
      background-color:black;
      position: fixed;
      color: white;}

  .update  {
    background-color:green;
    color: white;
    border: 0;
    outline: none;
    border-radius: 5px;
    width:60px;
    cursor: pointer;
  }   
  .delete
  {
    background-color:red;
  color: white;
    border: 0;
    outline: none;
    border-radius: 5px;
    width:60px;
    cursor: pointer;}

    .addnewstudent {
    background-color:blue;
    color: white;
    border: 0;
    outline: none;
    border-radius: 5px;
    width:110px;
    cursor: pointer;
    }
    
    </style>
</head>
<body bgcolor="95B9C7">
    <div id="header">
    <center><h2 >Student Management System</h2>
  <h3 style="color:black">Student Information</h3></center>
  <a href="add_student.php"><input type ='submit' value='Add new student' class ='addnewstudent'></a><br><br>
  

  <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="search" placeholder="Search by name" >
    <button type="submit">Search</button>
  </form><br><br>
  
<?php

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  
  // Fetch the students matching the search query from the database
  $students = $conn->query("SELECT * FROM students WHERE name LIKE '%$search%'");
} else {
  // Fetch all the students from the database
  $students = $conn->query("SELECT * FROM students");
}

?>

  
  <table border ="1" width = "600" height= "60" cell spacing = "5" align= "center">

    <tr bgcolor ="BDBB76" style="color:black";>
      <th > Name</th>
      <th>Roll Number</th>
      <th>Department</th>
      <th>Hostel</th>
      <th>Actions</th>
    </tr>
    <?php while ($row = $students->fetch_assoc()) { ?>
      <tr bgcolor ='FFFFE0' style="color:black"; >
        <td ><?php echo $row['name']; ?></td>
        <td><?php echo $row['roll_number']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['hostel']; ?></td>
        <td>
          <a href="edit_student.php?id=<?php echo $row['id']; ?>"><input type ='submit' value='update' class ='update' </a>
          <a href="delete_student.php?id=<?php echo $row['id']; ?>"> <input type='submit' value='delete' class ='delete' </a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
