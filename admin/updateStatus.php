<?php
include_once('dbConnect.php');
$q =$_GET['q'];
$a =$_GET['a'];
$success="1";
if($a=="status"){
    $status =$_GET['status'];
     $query ="UPDATE `ordertracking` SET `status`='$status' WHERE trackingNo='$q'";
        $result = mysqli_query($CONNECTION, $query);
        echo json_encode($success);
}
else if($a=='get_tNo'){
     $query ="SELECT `trackingNo` FROM `orderdetails` WHERE userId='$q'";
    $result = mysqli_query($CONNECTION, $query);
    $row = mysqli_fetch_assoc($result);
    $array[0]=$row;
    echo json_encode($array);
    
}
else if($a=='del'){
    $query ="DELETE FROM `clothes` Where articleId='$q'";
     $result = mysqli_query($CONNECTION, $query);
     echo json_encode($success);
    
}



?>