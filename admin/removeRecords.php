<?php
/**
 * Created by PhpStorm.
 * User: Khalid
 * Date: 1/24/2016
 * Time: 1:18 PM
 */
    include "dbConnect.php";
    $query = $_GET['query'];
    $id = $_GET['id'];
    if($query == "clients") {
        $sql = "Delete from $query where clientId = $id";
        $redirectSuccess = "location:add_clients.php?message=Record deleted successfully!";
        $redirectFail = "location:add_clients.php?message=Could not delete client!";
    }
    else if($query == "dealership") {
        $sql = "Delete from $query where dealerId = $id";
        $redirectSuccess = "location:addDealer.php?message=Record deleted successfully!";
        $redirectFail = "location:addDealer.php?message=Could not delete client!";
    }
    else {
        if($query == "clients") {
            header("location:add_clients.php?message=Could not delete record!");
        }
        else{
            header("location:addDealer.php?message=Could not delete record!");
        }
    }

    $result = mysqli_query($CONNECTION, $sql);
    header($redirectSuccess);
?>