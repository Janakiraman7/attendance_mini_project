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
    <style>
      label{
        font-size:1.5rem;
        width: 30rem;
        height:2rem;
        margin-top:1rem;
       
      }
      .displayarea{
        font-size:1.4rem;
        width: 30rem;
        height:2rem;
        margin-top:1.2rem;
        margin-left:1rem;
        text-transform:uppercase;
        color:green;
      }
      
    </style>
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

    echo"
  <div  id='recordformcontent'>
    <label>NAME:</label> <br>
    <label>REGISTER NUMBER:</label> <br>
    <label>DEPARTMENT:</label><br>
    <label>YEAR:</label><br>
    <label>CLASSES PRESENT:</label><br>
    <label>CLASSES ABSCENT:</label> <br>
    <label>ATTENDANCE % :</label> <br>
  </div>";
  echo"   <div id='recordforminput' >
     <div class='displayarea'>".$row["name"]."</div>
     <div class='displayarea'>".$row["regno"]."</div>
    <div class='displayarea'>".$row["department"]."</div>
     <div class='displayarea'>".$row["year"]."</div>
     <div class='displayarea'>".$row["present"]."</div>
     <div class='displayarea'>".$row["abscent"]."</div>
     <div class='displayarea'>".$row["attendance"]."</div> 
     </div>";

  if($count==0){
   
    header("Location:std_login.html");
   
  }

mysqli_close($conn);
?>

</body>

</html>
