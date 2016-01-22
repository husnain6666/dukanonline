<?php
/* Headers */

include "dbConnect.php";
/* Variables */

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $notification = $_POST['notify'];

if ($_FILES['image']['error'] > 0)
{
    mysqli_close($CONNECTION);
    header("location: addPoster.php?message=<span style='color:red'>Choose proper picture format!</span>");
}
else
{
    move_uploaded_file($_FILES["image"]["tmp_name"],"../images/" . $_FILES["image"]["name"]);
    $file="images/".$_FILES["image"]["name"];
    $query="insert into advertisement (title, description, picture, date, notification, active) VALUES ('$title','$desc','$file','$date', '$notification', 1)";

    try{
        $result=mysqli_query($CONNECTION,$query);
        if($result)
        {
            mysqli_close($CONNECTION);
        }
        else
        {
            mysqli_close($CONNECTION);
            header("location: addPoster.php?message=Could not save add!");
            throw new Exception("Problem in Query");
        }
    }

    catch (Exception $e){
        $e->getMessage($e);
    }
    header("location: addPoster.php?message=Add Saved!");
}
?>