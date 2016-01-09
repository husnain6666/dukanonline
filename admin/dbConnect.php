<?php


$USING_SERVER = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "electroshop";

//create connection
$CONNECTION = mysqli_connect($USING_SERVER, $USERNAME, $PASSWORD);

//check connection
if(!$CONNECTION) {
    die("Connection to server failed: " . mysqli_connect_error());
}
else {
   // echo "Connected Successfully!";
    if(!mysqli_select_db($CONNECTION, $DATABASE))
        die("Can't select database");
    //echo "Database selected";
}
?>