<?php
if(!empty($_GET["q"])){
    $q=$_GET["q"];
include_once('dbConnect.php');
$sql = "DELETE FROM `color` where colorName ='$q'";
$result = mysqli_query($CONNECTION, $sql);
    header("Location:addColor.php");

}else
header("Location:addColor.php");

?>