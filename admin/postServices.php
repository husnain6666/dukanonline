<?php
include_once('dbConnect.php');
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);
$errors = array();
$pass = randomPassword();
$pic1;
$pic11;

$errors = array();
$pass = randomPassword();
function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$valid_formats = array("jpeg", "jpg", "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP");
$path = "../images/services/";
if (isset($_POST['submit1'])) {

    echo "<script type='text/javascript'>$('#submit1').click(function(event){event.preventDefault(); }); </script>";

    if (empty($_POST["title"])) {
        $errors['title'] = "Please Fill This Field!";
    } else {
        $title = $_POST["title"];
    }
    if (empty($_POST["specification"])){
        $errors['specification'] = "Please Fill This Field!";
    } else {
        $specification = $_POST["specification"];
    }
    $art_name = $_POST['title'];
    $name = $_FILES['pic1']['name'];
    $size = $_FILES['pic1']['size'];

    if (strlen($name)) {
        list($txt, $ext) = explode(".", $name);
        if (in_array($ext, $valid_formats)) {
            $pic1 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
            $pic11 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
            $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
            $tmp = $_FILES['pic1']['tmp_name'];
            if (move_uploaded_file($tmp, $path . $actual_image_name)) {
                if (file_exists($path . $actual_image_name)) {
                    rename($path . $actual_image_name, $path . $pic1);
                }
                if (empty($errors)) {
                    include_once('dbConnect.php');
                    $sql = "INSERT INTO `services`(title,pic,specification) VALUES('$title','$pic1','$specification')";
                    echo $sql;

                    $result = mysqli_query($CONNECTION, $sql);
                    ?>
                    <script>
                        alert("save")
                        window.location.replace("addServices.php");
                    </script><?php }
            } else
                $errors['pic1'] = "Upload Failed";

        } else
            $errors['pic1'] = "Invalid File Format";
    } else
        $errors['pic1'] = "Please Select Image File";

}