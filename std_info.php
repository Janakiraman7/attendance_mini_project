<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    st
</head>
<body>
 
 
<?php
$reg_no = $_POST["regnum"];
$dept = $_POST["department"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM stdinfo WHERE regno='$reg_no' and department='$dept'  ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

    echo" <div>
    <label>REGISTER NUMBER:</label> <span>".$row["regno"]."</span><br><br>
    <label>NAME:</label> <span>".$row["name"]."</span><br><br>
    <label>DEPARTMENT:</label><span>".$row["department"]."</span><br><br>
    <label>YEAR:</label> <span>".$row["year"]."</span><br><br>
    <label>NO.OF DAYS PRESENT:</label> <span>".$row["present"]."</span><br><br>
    <label>NO.OF DAYS ABSCENT:</label> <span>".$row["abscent"]."</span><br><br> 
    <label>ATTENDANCE % :</label> <span>".$row["attendance"]."</span><br><br>
     </div>";
  if($count==0){
   
    header("Location:std_login.html");
   
  }

mysqli_close($conn);
?>

</body>

</html>
