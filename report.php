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
          <a href="timetable.html"><button class="nav-link  rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">TIMETABLE</button></a>
        </li>
        <li class="nav-item" role="presentation">
         <a href="attendance.html"><button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">ATTENDANCE</button></a>
        </li>
        <li class="nav-item" role="presentation">
          
          <a href="report.php"><button  class="nav-link active rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">REPORT</button></a>
        </li>
        <li class="nav-item" role="presentation">
          
          <a href="record.php"><button  class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">RECORDS</button></a>
        </li>
      </ul>
    </nav>
    <form action="report.php" method="post">
    <div id="selection">
     <div>
        <select name="year">
          <option selected disabled>SELECT YEAR</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
      </div>

     
    <div>
        <select name="department">
          <option selected disabled>SELECT DEPARTMENT</option>
          <option>bsc</option>
          <option>bca</option>
          <option>bcom</option>
          <option>bba</option>
          <option>bcm</option>
        </select>
      </div>
      <div>
        <input type="submit" name="report" value="GET" class="btn btn-outline-success">
      </div>
    
    </div>
  </form>
    <table class="table table-bordered table-striped" id="reporttable">
    
      <tr id="thead">
        <th>S.NO</th>
        <th>NAME</th>
        <th>REG.NO:</th>
        <th>DEPARTMENT</th>
        <th>YEAR</th>
        <th>NO.OF DAYS PRESENT</th>
        <th>NO.OF DAYS ABSCENT</th>
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
$sql="SELECT *  from stdinfo where year='$year' and department='$department' ORDER BY regno ";
$result=mysqli_query($conn,$sql);
$numrows=mysqli_num_rows($result);
$i=1;
if($numrows>0){
  while($rows= mysqli_fetch_assoc($result)){
  echo"<tr><td>".$i."</td><td>".$rows["name"]."</td><td>".$rows["regno"]."</td><td>".$rows["department"]."</td><td>".$rows["year"]."</td><td>".$rows["present"]."</td><td>".$rows["abscent"]."</td><td>".$rows["attendance"]."</td> </tr>";
  $i++;
  }
 
}

}


mysqli_close($conn);  
?>
    </table>
  </body>
</html>
