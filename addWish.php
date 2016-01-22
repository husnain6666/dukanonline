<?php
include('connectdb.php');
include('session.php');
$userId=$_SESSION['loginId'];

$a = $_GET["a"];
$check=false;
$sql = "SELECT articleId FROM wishlist where userId='$userId'";
$result=mysqli_query($connection,$sql);
while($table_record=mysqli_fetch_array($result)){
$articleId = $table_record['articleId'];
    if($a===$articleId){
    $check=true;
    }
}
if($check===false){
$sql = "insert into  wishlist  (articleId,userId) values ('$a','$userId')";
$result=mysqli_query($connection,$sql);
echo "Your wish has been added!";

}
else
{

    echo "Your wish exists!";
}



