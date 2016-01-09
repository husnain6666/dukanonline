<?php
/* Headers */

include "dbConnect.php";
/* Variables */

$title = $_POST['title'];
$desc = $_POST['desc'];
$date = $_POST['date'];
$notification_date = $_POST['notify'];
$addId = $_POST['addId'];
$active = 0;
if (isset($_POST['activecb'])) {
    $active = 1;
}
if($_FILES["image"]["name"] != "") {
    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $_FILES["image"]["name"]);
    $file = "images/" . $_FILES["image"]["name"];
    $query="UPDATE advertisement SET title='$title',description='$desc',picture='$file',date='$date',notification='$notification_date',active=$active WHERE addId = $addId";
}
else
{
    $query="UPDATE advertisement SET title='$title',description='$desc',date='$date',notification='$notification_date',active=$active WHERE addId = $addId";
}
    try{
        $result=mysqli_query($CONNECTION,$query);
        if($result)
        {
            mysqli_close($CONNECTION);
        }
        else
        {
            mysqli_close($CONNECTION);
            header("location: updatePosters.php?Id='$addId'&message=Could not save add!");
            throw new Exception("Problem in Query");
        }
    }

    catch (Exception $e){
        $e->getMessage($e);
    }
    header("location: posters.php?message=Add Updated!");

?>