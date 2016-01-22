<?php
/* Headers */

include "dbConnect.php";
/* Variables */

$id = $_POST['id'];
$pic = $_POST['image'];

if ($_FILES['image']['error'] > 0)
{
    mysqli_close($CONNECTION);
    header("location: add_clients.php?message=<span style='color:red'>Choose proper picture format!</span>");
}
else
{
    move_uploaded_file($_FILES["image"]["tmp_name"],"../images/shippingpartner/" . $_FILES["image"]["name"]);
    $file="images/shippingpartner/".$_FILES["image"]["name"];
    $query="insert into clients (picture) VALUES ('$file')";

    try{
        $result=mysqli_query($CONNECTION,$query);
        if($result)
        {
            mysqli_close($CONNECTION);
        }
        else
        {
            mysqli_close($CONNECTION);
            header("location: add_clients.php?message=Could not save Client!");
            throw new Exception("Problem in Query");
        }
    }

    catch (Exception $e){
        $e->getMessage($e);
    }
    header("location: add_clients.php?message=Client Saved!");
}
?>