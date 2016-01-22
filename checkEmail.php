<?php
/**
 * Created by PhpStorm.
 * User: zain
 * Date: 9/18/15
 * Time: 11:39 AM
 */
include('connectdb.php');
$q = $_REQUEST["q"];

$query="select emailAddress from userinfo where emailAddress='$q'";
$result=mysqli_query($connection,$query);
if($result->num_rows>0){

    $check="This email already exists";
    echo $check;
}
else{  ?><span class='glyphicon glyphicon-ok'> valid</span>
<?php
}
?>