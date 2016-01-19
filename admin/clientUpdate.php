<?php
/* Headers */

include "dbConnect.php";
/* Variables */

$id = $_POST['client_name'];
echo $id;
if($_FILES["image"]["name"] != "") {
    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/shippingpartner/" . $_FILES["image"]["name"]);
    $file = "images/shippingpartner/" . $_FILES["image"]["name"];
    $query="UPDATE clients SET picture='$file' WHERE clientId = $id";
    $result=mysqli_query($CONNECTION,$query);
    if($result)
    {
        mysqli_close($CONNECTION);
    }
    else
    {
        mysqli_close($CONNECTION);
        header("location: updateClient.php?Id='$Id'&message=Could not save client!");
        throw new Exception("Problem in Query");
    }
}

header("location: add_clients.php?message=Client Updated!");

?>