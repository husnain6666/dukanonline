<?php
/**
 * Created by PhpStorm.
 * User: zain
 * Date: 9/18/15
 * Time: 11:39 AM
 */
include('connectdb.php');
include('session.php');
$q = $_REQUEST["q"];
$userName=$_SESSION['loginUser'];
$query="select password from userinfo where emailAddress='$userName'";
$result=mysqli_query($connection,$query);
if($result->num_rows>0){
    $table_record=mysqli_fetch_array($result);
    $db_password=$table_record['password'];
 if($q===$db_password){
     $check= "Valid";
    echo $check;
}
else{
    echo 'invalid Password';

}
}
?>