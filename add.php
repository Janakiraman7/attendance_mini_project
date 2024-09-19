<?php
$reg_no = $_POST["regno"];
$name = $_POST["name"];
$department = $_POST["department"];
$year = $_POST["year"];
$present = $_POST["present"];
$abscent = $_POST["abscent"];
$atttendance = $_POST["attendance"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
echo"connection successful";
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT into stdinfo (`s.no`, `name`, `regno`, `department`, `year`, `present`, `abscent`, `attendance`) VALUES (NULL, '$name', '$reg_no', '$department', '$year', '$present', '$abscent', '$atttendance') ";
if( mysqli_query($conn, $sql)){
    
    header("location:record.html");
    
}



    
  
mysqli_close($conn);
?>
