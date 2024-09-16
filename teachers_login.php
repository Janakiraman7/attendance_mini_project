<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div>
        <h1>TEACHER</h1>
        <form action="teachers_login.php" method="post">
            <input type="number" name="id" placeholder="Enter id" required><br><br>
            <input type="password" name="password" placeholder="enter password" required>
            <p id="warning" style="color:red"></p>
            <input type="submit" value="login" name="submit"> <br>
            
         </form>
         
    </div>

    
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
   header("location:teacherpage.html");
}else{
  echo'  <script>

document.getElementById("warning").innerHTML = "enter the details properly !";
</script>';
}


mysqli_close($conn);

}
?>