<?php
include('connectdb.php');
$userId=$_SESSION['loginId'];
//include('session.php');
//$userId=$_SESSION['loginId'];

$userid = $_GET["userId"];
$articleno = $_GET["articleNo"];
$trackingno = $_GET["trackingNo"];

$sql = "DELETE FROM orderdetails WHERE userId='$userid' AND articleId='$articleno' AND trackingNo='$trackingno'";
$result=mysqli_query($connection,$sql);

$sql = "DELETE FROM notifications WHERE trackingId='$trackingno' LIMIT 1";
$result1=mysqli_query($connection,$sql);

$sql="select count(userId) as quantityCart from orderdetails where trackingNo='$trackingno'";
$result2=mysqli_query($connection,$sql);
$table_record=mysqli_fetch_array($result2);
$quantityCart=$table_record['quantityCart'];

if($quantityCart === '0'){
    $sql = "DELETE FROM ordertracking WHERE trackingNo='$trackingno'";
    $result=mysqli_query($connection,$sql);
}

if($result){
    echo "your wish deleted!";
}
else
{

    echo "your wish exists!";
}



