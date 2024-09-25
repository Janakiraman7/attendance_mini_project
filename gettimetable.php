<?php
    $year=$_POST['yr'];
    $department=$_POST['dept'];
    
   
    $con=mysqli_connect("localhost","root","","miniproject");
    $sql="SELECT * from timetable WHERE year='$year' and department='$department' "  ;
    $result=mysqli_query($con,$sql);
    
    $data=array();
    if(mysqli_num_rows($result)>0){
        $timetable=mysqli_fetch_assoc($result);
        $data['status']='ok';
        $data['result']=$timetable;
    }else{
        $data['status']='err';
        $data['result']='';
    }
    echo json_encode($data);


?>