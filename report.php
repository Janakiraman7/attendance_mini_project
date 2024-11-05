<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REOPORT</title>
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
          <a href="timetable.html"><button class="nav-link  rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">TEACHER'S TIMETABLE</button></a>
        </li>
        <li class="nav-item" role="presentation">
         <a href="attendance.html"><button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">STUDENT ATTENDANCE</button></a>
        </li>
        <li class="nav-item" role="presentation">
          
          <a href="report.html"><button  class="nav-link active rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">ATTENDANCE REPORT</button></a>
        </li>
        <li class="nav-item" role="presentation">
          
          <a href="record.php"><button  class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">STUDENT RECORDS</button></a>
        </li>
      </ul>
    </nav>
   
    <table class="table table-bordered table-striped" id="reporttable">
      <tr >
        <td colspan="8">
        <center><h2><?php echo$_POST["month"]; ?> MONTH ATTENDANCE REPORT</h2></center>
        </td>
      </tr>
    
      <tr id="thead">
        <th>S.NO</th>
        <th>NAME</th>
        <th>REG.NO:</th>
        <th>DEPARTMENT</th>
        <th>YEAR</th>
        <th>NO.OF DAYS PRESENT</th>
        <th>TOTAL NO.OF DAYS </th>
        <th>ATTENDANCE %</th>
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

if(isset($_POST["report"])){

  $department = $_POST["department"];
  $year = $_POST["year"];
  $month =$_POST["month"];
  $month_no=0;
  switch ($month) {
    case "january":
      $month_no=1;
      break;
  
    case "febuary":
      $month_no=2;
      break;
  
    case "march":
      $month_no=3;
      break;
  
    case "april":
        $month_no=4;
        break;
  
    case "may":
        $month_no=5;
        break;
  
    case "june":
        $month_no=6;
        break;
  
    case "july":
        $month_no=7;
        break;
  
    case "august":
        $month_no=8;
        break;
  
    case "september":
        $month_no=9;
        break;
  
    case "october":
        $month_no=10;
        break;
  
      case "november":
        $month_no=11;
        break;
  
      case "december":
        $month_no=12;
        break;
  
    
  }

  $sql="SELECT *  from stdinfo where year='$year' and department='$department' ORDER BY regno ";
  $result=mysqli_query($conn,$sql);
  $numrows=mysqli_num_rows($result);
  $i=1;
  if($numrows>0){
    while($rows= mysqli_fetch_assoc($result)){

$reg_no=$rows["regno"];
 // query to get no of days present for particular month
$query= "SELECT SUM(status) AS present ,count(status) AS totaldays  from attendance where regno='$reg_no' and month(date)=$month_no and year=$year";
$present_total=mysqli_query($conn,$query);
$no_present_total=mysqli_fetch_assoc($present_total);
$no_of_days_present= $no_present_total["present"];
$total_no_of_days= $no_present_total["totaldays"];



if($no_of_days_present != 0 && $total_no_of_days!=0){


$attendance = $no_of_days_present/$total_no_of_days *100;

echo"<tr><td>".$i."</td><td>".$rows["name"]."</td><td>".$rows["regno"]."</td><td>".$rows["department"]."</td><td>".$rows["year"]."</td><td>".$no_of_days_present."</td><td>".$total_no_of_days."</td><td>".$attendance."</td> </tr>";
$i++;
 }
 else{
 continue;
}

}

  }
  else{
    header("Location:report.html");
  }



}
mysqli_close($conn);  
?>
    </table>
    
  </body>
</html>
