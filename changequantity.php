<?php
include('connectdb.php');
$userId=$_SESSION['loginId'];
//include('session.php');
//$userId=$_SESSION['loginId'];
$quantity = $_GET["quantity"];
$userid = $_GET["userId"];
$articleno = $_GET["articleNo"];
$trackingno = $_GET["trackingNo"];


$sql = "SELECT price,discount FROM article where articleId='$articleno'";
$result=mysqli_query($connection,$sql);
$table_record=mysqli_fetch_array($result);
$price = $table_record['price'];

$discount = $table_record['discount'];
$discountedPrice = ($price * $discount)/100;
$discountedPrice = $price - $discountedPrice;
$totalPrice=$discountedPrice*$quantity;


$sql = "update orderdetails set quantity='$quantity',totalPrice=$totalPrice WHERE userId='$userid' AND articleId='$articleno' AND trackingNo='$trackingno'";
$result=mysqli_query($connection,$sql);



if($result){
    echo "your wish deleted!";
}
else
{

    echo "your wish exists!";
}



