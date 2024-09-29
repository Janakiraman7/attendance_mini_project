<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RECORDS</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    
      <nav>
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
          <li class="nav-item" role="presentation">
            <a href="timetable.html"><button class="nav-link  rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">TIMETABLE</button></a>
          </li>
          <li class="nav-item" role="presentation">
           <a href="attendance.html"><button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">ATTENDANCE</button></a>
          </li>
          <li class="nav-item" role="presentation">
            
            <a href="report.php"><button  class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">REPORT</button></a>
          </li>
          <li class="nav-item" role="presentation">
            
            <a href="record.php"><button  class="nav-link active rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">RECORDS</button></a>
          </li>
        </ul>
      </nav>
    
    
      
        <div id="recordformcontent">
          
            <label>REGISTER NUMBER:</label> <br><br>
          <label>NAME:</label> <br><br>
          <label>DEPARTMENT:</label><br><br>
          <label>YEAR:</label><br><br>
          <label>NO.OF DAYS PRESENT:</label> <br><br>
          <label>NO.OF DAYS ABSCENT:</label><br><br> 
          <label>ATTENDANCE % :</label> <br><br>
           
        </div>

        <div id="recordforminput">
          <form id="recordform" action="record.php" method="post">
            <input type="text" name="regno" required><br><br>
            <input type="text" name="name" requiered><br><br>
            <input type="text" name="department" required><br><br>
            <input type="number" name="year" required><br><br>
            <input type="number" name="present"><br><br>
            <input type="number" name="abscent"><br><br>
            <input type="text" name="attendance"><br><br>
            <div id="crudbtn">
            <input type="submit" name="add" value="ADD" class="btn btn-outline-primary" >
            <input type="submit" name="delete" value="DELETE" class="btn btn-outline-primary" >
            <input type="submit" name="update" value="UPDATE" class="btn btn-outline-primary" >
            </div>
          </form>

        </div>

    
   
  </body>
  
</html>
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

  
  if(isset($_POST["add"])){

  $reg_no = $_POST["regno"];
  $name = $_POST["name"];
  $department = $_POST["department"];
  $year = $_POST["year"];
  $present = $_POST["present"];
  $abscent = $_POST["abscent"];
  $atttendance = $_POST["attendance"];

    $sql = "INSERT into stdinfo (`s.id`, `name`, `regno`, `department`, `year`, `present`, `abscent`, `attendance`) VALUES (NULL, '$name', '$reg_no', '$department', '$year', '$present', '$abscent', '$atttendance')  ";
    if( mysqli_query($conn, $sql)){
    
      echo'<script>alert("record added sucessfully!");</script>';
    
     }
mysqli_close($conn);  
  }

  if(isset($_POST["delete"])){
    $reg_no = $_POST["regno"];
    $department = $_POST["department"];

    $sql = "DELETE FROM stdinfo WHERE regno='$reg_no' and department='$department' ";
if( mysqli_query($conn, $sql)){
    
  echo'<script>alert("record deleted sucessfully!");</script>';
    
}
 
mysqli_close($conn);
  }

  if(isset($_POST["update"])){

 $reg_no = $_POST["regno"];
$name = $_POST["name"];
$department = $_POST["department"];
$year = $_POST["year"];
$present = $_POST["present"];
$abscent = $_POST["abscent"];
$atttendance = $_POST["attendance"];

$sql = "UPDATE stdinfo SET name='$name',regno='$reg_no',department='$department',year='$year',present='$present',abscent='$abscent',attendance='$atttendance' WHERE regno='$reg_no'  ";
if( mysqli_query($conn, $sql)){
   
  echo'<script>alert("record updated sucessfully!");</script>';
    
}
mysqli_close($conn);  
  }



?>

