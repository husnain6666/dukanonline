<?php
include('connectdb.php');
include('session.php');
$userId=$_SESSION['loginId'];


$a = $_GET["a"];

//$userId
$sql = "DELETE FROM wishlist WHERE userId='$userId' AND articleId='$a'";
$result=mysqli_query($connection,$sql);
if($result){
    echo "your wish deleted!";
}
else
{

    echo "your wish exists!";
}



