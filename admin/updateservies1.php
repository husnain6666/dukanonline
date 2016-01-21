<?php
$pic1="";
$pic11="";
$pass= randomPassword();
$active ="";
$picture1="#";
$path = "../images/services/";
$q ="";
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$valid_formats = array("jpeg", "jpg", "png", "gif", "bmp","JPEG", "JPG", "PNG", "GIF", "BMP");

if (isset($_POST['submit1'])) {
    if (empty($_POST["q"])) {
        echo "muaz";

    } else {
        $q = $_POST["q"];
echo "muaz";
    }
    if (empty($_POST["title"])) {
        $errors['article_name'] = "Please Fill This Field!";

    } else {
        $article_name = $_POST["title"];
    }
    if (empty($_POST["specification"]))
    {
        $errors['specification'] = "Please Fill This Field!";

    } else
    {
        $description3 = $_POST["specification"];
    }
    $active =0;


    if (isset($_POST['active'])) {
        $active = 1;
    }
    $art_name = $_POST['title'];
    $name = $_FILES['pic1']['name'];
    $size = $_FILES['pic1']['size'];
    if($name!="") {
        if (strlen($name)) {
            list($txt, $ext) = explode(".", $name);
            if (in_array($ext, $valid_formats)) {
                $pic1 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
                $pic11 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
                $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
                $tmp = $_FILES['pic1']['tmp_name'];
                if (move_uploaded_file($tmp, $path .$actual_image_name)) {
                    if(file_exists ( $path.$actual_image_name ))
                    {
                        rename($path.$actual_image_name,$path.$pic1);

                        if (file_exists($picture1)) {
                            unlink($picture1);
                        }
                    }

                } else
                    $errors['pic1'] = "Invalid File Format";
            } else
                $errors['pic1'] = "Please Select Image File";

        }
    }
    $p1="";
    if($pic1!=""){
        $p1=",pic='".$pic1."'";;
    }else{
        $p1="";
    }


    if (empty($error)) {
        //  $sql = "UPDATE `article` SET `articleName`='$article_name' ,`Category`='$category' ,`brand`='$bN' ,`specification`='$description' ,`weekDeal`='$hotdeal',bestSeller='$bestsale' ,Sale='$sale',`price`='$ppp' ,`quantity`='$quantity',`discount`='$tp'  ,`date`='$date' ,`color`='$color' $p1 $p2 $p3  WHERE articleId='$ar_id'";
   //     $sql = "UPDATE `services` SET `title`='$title' ,`specification`='$description3',active='$active' $p1  WHERE title='$q'";

     //   $result = mysqli_query($CONNECTION, $sql);


        header("location: updateService.php?q=muaz&message=Add Saved!");




    }
}