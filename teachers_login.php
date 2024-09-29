<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
   
       
        <form id="teacherloginform" action="teachers_login.php" method="post">
             <h1>TEACHER</h1>
            <input type="number" name="id" placeholder="Enter id" required>
            <input type="password" name="password" placeholder="enter password" required>
            <p id="warning" style="color:red"></p>
            <input type="submit" value="login" name="submit" class="btn btn-outline-primary">
            
         </form>
         
    
    
</body>
</html>

<?php
if (isset($_POST['submit'])){
$id = $_POST["id"];
$inputpassword = $_POST["password"];

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

$sql = "SELECT * FROM teachers_details WHERE id='$id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$dbpassword = $row["password"];
if($inputpassword  == $dbpassword){
   header("location:timetable.html");
}else{
  echo'  <script>

document.getElementById("warning").innerHTML = "enter the details properly !";
</script>';
}


mysqli_close($conn);

}
?>