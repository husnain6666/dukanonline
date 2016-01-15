<?php
include('connectdb.php');
if(session_start()!==true){
    session_start();
}
if(isset( $_SESSION['loginUser'])){
    $userName=$_SESSION['loginUser'];
//$userName=stripslashes($userName);
//$userName=mysql_real_escape_string($userName);
    $query_session="select * from userinfo where emailAddress='$userName'";
    $result=mysqli_query($connection,$query_session);

    $row = mysqli_fetch_array($result);
    $login_session_staff =$row['emailAddress'];
    if(!isset($login_session_staff)){
        mysql_close($connection); // Closing Connection
        header('Location: index.php'); // Redirecting To Home Page
    }
}
else{
    // header('Location: index.php'); // Redirecting To Home Page
}

?>