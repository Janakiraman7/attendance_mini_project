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

$sql = "UPDATE stdinfo SET name='$name',regno='$reg_no',department='$department',year='$year',present='$present',abscent='$abscent',attendance='$atttendance' WHERE regno='$reg_no'  ";
if( mysqli_query($conn, $sql)){
   
    header("location:record.html");
    
}
mysqli_close($conn);  

?>
