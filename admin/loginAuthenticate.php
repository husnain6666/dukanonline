<?php
include('session.php');
include('dbConnect.php');
$errors = array();
$errorFlag = false;
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM userinfo WHERE emailAddress = '$username' AND password = '$password'";
$result = mysqli_query($CONNECTION, $query);
if($result) {
    if(mysqli_num_rows($result) > 0) {
        $member = mysqli_fetch_assoc($result);
        $_SESSION['USER_ID'] = $member['userId'];
        $_SESSION['USERNAME'] = $member['firstName'];
        header("location: data.php");
    }
    else {
        header("location: login.php");
    }
}
else {
    die ("Query Failed");
}

?>