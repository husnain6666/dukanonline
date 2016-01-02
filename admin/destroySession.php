<?php
include("session.php");
if(isset($_SESSION["USERNAME"])||isset($_SESSION["USER_ID"])){
unset($_SESSION["USERNAME"]);
unset($_SESSION["USER_ID"]);
header("Location:login.php");
}

?>