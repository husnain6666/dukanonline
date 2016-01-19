<?php
/* Headers */

include "dbConnect.php";
/* Variables */

$id = $_POST['client_name'];
echo $id;
if($_FILES["image"]["name"] != "") {
    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/shippingpartner/" . $_FILES["image"]["name"]);
    $file = "images/shippingpartner/" . $_FILES["image"]["name"];
    $query="UPDATE dealership SET picture='$file' WHERE dealerId = $id";
    $result=mysqli_query($CONNECTION,$query);
    if($result)
    {
        mysqli_close($CONNECTION);
    }
    else
    {
        mysqli_close($CONNECTION);
        header("location: updateDealer.php?Id='$Id'&message=Could not save dealership!");
        throw new Exception("Problem in Query");
    }
}

header("location: addDealer.php?message=Dealership Updated!");

?>