<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>attendancephp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <style>
      .table{
        width:60vw;
      }
      #attendance{
        width:100vw;
        display:grid;
        place-items:center;
      }
     .table{
      width:50vw;
     }
  
    </style>
</head>
<body>
<nav>
    
    <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
      <li class="nav-item" role="presentation">
        <a href="timetable.html"><button class="nav-link rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">TEACHER'S TIMETABLE</button></a>
      </li>
      <li class="nav-item" role="presentation">
       <a href="attendance.html"><button class="nav-link active rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">STUDENT ATTENDANCE</button></a>
      </li>
      <li class="nav-item" role="presentation">
        
        <a href="report.html"><button  class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">ATTENDANCE REPORT</button></a>
      </li>
      <li class="nav-item" role="presentation">
        
        <a href="record.php"><button  class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">STUDENT RECORDS</button></a>
      </li>
    </ul>
  
</nav>
<div id="attendance">
<table class="table table-bordered table-striped" id="reporttable">
    
      <tr id="thead">
        <th>S.NO</th>
        <th>NAME</th>
        <th>PRESENT</th>
        <th>ABSCENT</th>

      </tr>
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

if(isset($_POST["attendance"])){

  $department = $_POST["department"];
  $year = $_POST["year"];
  $date=$_POST["date"];
  $period=$_POST["period"];
  
  $sql="SELECT *  from stdinfo where year='$year' and department='$department' ORDER BY regno ";
  $result=mysqli_query($conn,$sql);
  $numrows=mysqli_num_rows($result);
  $i=1;
  if($numrows>0){
    while($rows= mysqli_fetch_assoc($result)){
      $regno=$rows["regno"];
      $add = "INSERT INTO attendance (regno,date,year) VALUES ('$regno','$date',$year)"; 
      mysqli_query($conn,$add);
    echo"<tr><td>".$i."</td><td>".$rows["name"]."</td><td>"."<center><input style='width:1.5rem;height:1.5rem;' name='$regno' id='status' data-status='1' data-regno='$regno' data-date='$date'data-period='$period' type='radio'></center>"."</td><td>"."<center><input style='width:1.5rem;height:1.5rem;' name='$regno' id='status' data-status='0' data-regno='$regno' data-date='$date'data-period='$period' type='radio'></center>"."</td></tr>";
    $i++;
    }
   
  }
  else{
   header("location:attendance.html");
  }
}

mysqli_close($conn);  
?>
    </table>

</div>
<script>
$(document).ready(function(){

$(document).on('change','#status',function(){

var regno=$(this).data('regno');
var date=$(this).data('date');
var period=$(this).data('period');
var status=$(this).data('status');
$.ajax({
url:"updateattendance.php",
method:"POST",
data:{regno:regno,date:date,period:period,status:status}

});


});


});



</script>
</body>
</html>