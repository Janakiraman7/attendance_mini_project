<?php
$reg_no = $_POST["regno"];
$department = $_POST["department"];


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

$sql = "DELETE FROM stdinfo WHERE regno= '$reg_no' and department='$department' ";
if( mysqli_query($conn, $sql)){
    
    header("location:record.html");
    
}



    
  
mysqli_close($conn);
?>
