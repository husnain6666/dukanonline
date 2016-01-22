<?php
include_once('dbConnect.php');
include_once('session.php');
    $addId = $_GET["a"];
    $delQuery = "Delete from advertisement where addId = $addId";
    $queryResult = mysqli_query($CONNECTION,$delQuery);
    if($queryResult)
    {
        header("location: posters.php?message=Add Removed!");
    }
    else
    {
        header("location: posters.php?message=Could not remove add!");
    }
?>