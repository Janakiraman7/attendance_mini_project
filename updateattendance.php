<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$regno=$_POST["regno"];
$date=$_POST["date"];
$period='period'.$_POST["period"];       
$status=$_POST["status"];
$sql="UPDATE attendance SET  $period= $status where regno='$regno' AND date='$date' ";
mysqli_query($conn,$sql);
mysqli_close($conn);

         
?>