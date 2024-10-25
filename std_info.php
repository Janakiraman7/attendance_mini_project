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
      h1{
        text-transform:uppercase;
        padding:1rem 1rem 1rem 1rem;
      }
      
    </style>
</head>
<body>
 
 
<?php

try{
$reg_no = $_POST["regnum"];
$dept = $_POST["department"];
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
if($count==0){
   
  header("Location:std_login.html");
 
}
$row = mysqli_fetch_assoc($result);


// query to get no of days present for particular month
$query= "SELECT SUM(status) AS present ,count(status) AS totaldays from attendance where regno='$reg_no' and month(date)=$month_no";
$present_total=mysqli_query($conn,$query);
$no_present_total=mysqli_fetch_assoc($present_total);
$no_of_days_present= $no_present_total["present"];
$total_no_of_days= $no_present_total["totaldays"];



if($no_of_days_present != 0 && $total_no_of_days!=0){


$attendance = $no_of_days_present/$total_no_of_days *100;

echo "<center><h1>".$month." month attendance report</h1></center>";
  echo"
  <div  id='recordformcontent'>
    <label>NAME:</label> <br>
    <label>REGISTER NUMBER:</label> <br>
    <label>DEPARTMENT:</label><br>
    <label>YEAR:</label><br>
    <label>NO.OF DAYS PRESENT:</label><br>
    <label>TOTAL NO.OF DAYS :</label> <br>
    <label>ATTENDANCE % :</label> <br>
  </div>";

  echo"   <div id='recordforminput' >
     <div class='displayarea'>".$row["name"]."</div>
     <div class='displayarea'>".$row["regno"]."</div>
    <div class='displayarea'>".$row["department"]."</div>
     <div class='displayarea'>".$row["year"]."</div>
     <div class='displayarea'>".$no_of_days_present."</div>
     <div class='displayarea'>".$total_no_of_days."</div>
     <div class='displayarea'>".$attendance."</div> 
     </div>";
}
else{
  header("Location:std_login.html"); 
}
  
}
  catch(EXCEPTION $e){

    echo "no results found".$e;
  }


mysqli_close($conn);


?>

</body>

</html>
