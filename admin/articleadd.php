<?php
include_once('dbConnect.php');


//include_once('session.php');
$pic1;
$pic2;
$pic3;
$pic11;
$pic22;
$pic33;

$errors = array();

$pass= randomPassword();

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
if(isset($_POST['submit1']))
{
   





//                        echo "<script type='text/javascript'>        $('#submit1').click(function(event){event.preventDefault(); }); </script>";

    if (empty($_POST["article_name"])) {
        $errors['article_name']="Please Fill This Field!";

    } else {
        $article_name=$_POST["article_name"];
       
    }

    if (empty($_POST["categoryName"])) {
        $errors['category']="Please Fill This Field!";

    } else {
        $categoryName=$_POST["categoryName"];

    }
    if (empty($_POST["brandnames"])) {
        $errors['material']="Please Fill This Field!";

    } else {
        $brandsname=$_POST["brandnames"];

    }




    if (empty($_POST["introspec"]))
    {
        $errors['introspec']="Please Fill This Field!";

    } else
    {
        $description1 = $_POST["introspec"];
    }
    if (empty($_POST["detailsspec"]))
    {
        $errors['detailsspec']="Please Fill This Field!";

    } else
    {
        $description2=$_POST["detailsspec"];
    }
    if (empty($_POST["specification"]))
    {
        $errors['specification'] = "Please Fill This Field!";

    } else
    {
        $description3 = $_POST["specification"];
    }




    $description=$description1."0_0".$description2."0_0".$description3;

    $hotdeal=false;
    $bestsale=false;
    $sale=false;

    if (isset($_POST['hot_deal'])){
        $hotdeal=true;
    }
    if (isset($_POST['bestseller'])){
        $bestsale  =true;
    }
    if (isset($_POST['sale'])){
        $sale=true;
    }



    /*    if (empty($_POST["quantity"])) {
        $errors['quantity']="Please Fill This Field!";

        } else {
                $quantity=$_POST["quantity"];
        }*/

    if (empty($_POST["datepicker"])) {
        $errors['date']="Please Fill This Field!";

    } else {
        $date=$_POST["datepicker"];
    }
    /*if (empty($_POST["colors"])) {
    $errors['colors']="Please Fill This Field!";

    } else {
            $color=$_POST["colors"];
    }
    */
    if (empty($_POST["ppp"])) {
        $errors['ppp']="Please Fill This Field!";

    } else {
        $ppp=$_POST["ppp"];
    }
    //    if (empty($_POST["tp"])) {
    //  $errors['tp']="Please Fill This Field!";

    //  } else {
    $tp=$_POST["tp"];
    //  }
    $path ="../photo/";
    $art_name=$_POST['article_name'];
    $name = $_FILES['pic1']['name'];
    $size = $_FILES['pic1']['size'];

    if(strlen($name))
    {
        list($txt, $ext) = explode(".", $name);
        if(in_array($ext,$valid_formats))
        {
            //	if($size<(345*777))
            //		{
            $pic1 =$art_name."_".$pass."_"."_pic1_".".".$ext;
            $pic11 =$art_name."_".$pass."_"."_pic1_".".".$ext;
            $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
            $tmp = $_FILES['pic1']['tmp_name'];
            if(move_uploaded_file($tmp, $path.$actual_image_name))
            {
                if(file_exists ( $path.$actual_image_name ))
                {
                    rename($path.$actual_image_name,$path.$pic1);
                }
            }
            else
                $errors['pic1']="Upload Failed";
            //	}
            //	else
            //	$errors['pic1']="Image size grater than 1MB";
        }
        else
            $errors['pic1']="Invalid File Format";
    }

    else
        $errors['pic1']="Please Select Image File";

    $name2 = $_FILES['pic2']['name'];
    $size = $_FILES['pic2']['size'];
    if($name2!="")
    {
        if(strlen($name2))
        {
            list($txt, $ext) = explode(".", $name2);
            if(in_array($ext,$valid_formats))
            {
                //     if($size<(345*777))
                //  {
                $pic2 =$art_name."_".$pass."_"."_pic2_".".".$ext;
                $pic22 =$art_name."_".$pass."_"."_pic2_".".".$ext;
                $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
                $tmp = $_FILES['pic2']['tmp_name'];
                if(move_uploaded_file($tmp, $path.$actual_image_name))
                {
                    if(file_exists ( $path.$actual_image_name )){
                        rename($path.$actual_image_name,$path.$pic2);
                    }



                }
                else
                    $errors['pic2']="Upload Failed";
                //   }
                //   else
                //  $errors['pic2']="Image size grater than 1MB";
            }
            else
                $errors['pic2']="Invalid File Format";
        }

        else{
            //$errors['pic2']="Please Select Image File";

        }
    }//end pic 2
    else{
        $pic2="";
    }

    $name3 = $_FILES['pic3']['name'];
    $size = $_FILES['pic3']['size'];
    if($name3!="")
    {

        if(strlen($name3))
        {
            list($txt, $ext) = explode(".", $name3);
            if(in_array($ext,$valid_formats))
            {
                //if($size<(345*777))
                // {
                $pic3 =$art_name."_".$pass."_"."_pic3_".".".$ext;
                $pic33 =$art_name."_".$pass."_"."_pic3_".".".$ext;
                $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
                $tmp = $_FILES['pic3']['tmp_name'];
                if(move_uploaded_file($tmp, $path.$actual_image_name))
                {
                    if(file_exists ( $path.$actual_image_name ))
                    {
                        rename($path.$actual_image_name,$path.$pic3);
                    }


                }
                else
                    $errors['pic3']="Upload Failed";
                //      }
                //        else
                //          $errors['pic3']="Image size grater than specified";
            }
            else
                $errors['pic3']="Invalid File Format";
        }

        else{
            //$errors['pic3']="Please Select Image File";

        }
    }//end pic 3
    else{
        $pic3="";
    }




    $date1 = $_POST['datepicker'];
    $parts = explode('/', $date1);
    $date = "$parts[2]-$parts[0]-$parts[1]";


    $sql = "INSERT INTO article(articleName,Category,brand,specification,weekDeal,bestSeller,Sale,price, discount, date,picture1,picture2,picture3) VALUES('$article_name','$categoryName','$brandsname','$description','$hotdeal','$bestsale','$sale','$ppp','$tp','$date','$pic1','$pic2','$pic3')";

    $result = mysqli_query($CONNECTION, $sql);


    header("LOCATION: addArticle.php");
}





    ?>