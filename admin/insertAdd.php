<?php
/* Headers */

include "dbConnect.php";
/* Variables */

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];

if ($_FILES['image']['error'] > 0)
{
    mysqli_close($CONNECTION);
    header("location: addPoster.php?message=<span style='color:red'>Choose proper picture format!</span>");
}
else
{
    move_uploaded_file($_FILES["image"]["tmp_name"],"../images/" . $_FILES["image"]["name"]);
    $file="images/".$_FILES["image"]["name"];
    $query="insert into electroshop.advertisement (title, description, picture, date) VALUES ('$title','$desc','$file','$date')";

    try{
        $result=mysqli_query($CONNECTION,$query);
        if($result)
        {
            mysqli_close($CONNECTION);
            echo "yo";
            echo " ".$desc;
        }
        else
        {
            mysqli_close($CONNECTION);
            //header("location: addPoster.php?message=Could not save add!");
            throw new Exception("Problem in Query");
            echo "no";
        }
    }

    catch (Exception $e){
        $e->getMessage($e);
    }
    //header("location: addPoster.php?message=Add Saved!");
}
?>