<?php
    $year=$_POST['yr'];
    $department=$_POST['dept'];
    
   
    $con=mysqli_connect("localhost","root","","miniproject");
    $sql="SELECT * from timetable WHERE year=$year and department='$department' "  ;
    $result=mysqli_query($con,$sql);
    $data=array();
    $count=mysqli_num_rows($result);
    if($count>0){
        $data['status']='ok';
        for($i=1;$i<=$count;$i++){
            $timetable=mysqli_fetch_assoc($result);
            $data['result'.$i]=$timetable;
        }
       
    }else{
        $data['status']='err';
        $data['result']='';
    }
    echo json_encode($data);


?>