<?php

require_once 'PHPMailer-master/PHPMailerAutoload.php';
require_once 'PHPMailer-master/class.smtp.php';

if (isset($_POST["submit1"])) {


    $sub = $_POST["article_name"];
    $f=$_FILES["file"]['name'];
    $file1=realpath ($f);
    $path = "newsletter/";
    include("dbConnect.php");
    $tmp = $_FILES['file']['tmp_name'];
     if(move_uploaded_file($tmp, $path.$f))
     {
          $query = "SELECT firstName,lastName,emailAddress FROM `userinfo` ";
          $result = mysqli_query($CONNECTION, $query);
          if ($result) {
          if ($result->num_rows > 0) 
           {
             while ($notify = mysqli_fetch_assoc($result)) {
             $body = "Dear " . $notify["firstName"] . " " . $notify["lastName"] . "," . '<br><br>' . $_POST["body"] . '<br><br>' . "Regards," . '<br><br>' . "<a      href='www.electroshop.pk'>ElectroShop.pk</a>";
             $file1=$path.$f;
             mailsend($sub, $notify["emailAddress"], $file1, $body, $notify["firstName"], $notify["lastName"]);
            }
       }
       }
        echo "Mail has been sent!";
        echo "<script>location='phpMail.php'</script>";

    }
}
function mailsend($subjects, $emailto, $file1, $body, $fName, $lName)
{
    $mail = new PHPMailer;
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->isSMTP();
    $mail->SMTPAuth = true;                             // Enable SMTP authentication
    $mail->Username = 'electroshopsender@gmail.com';                 // SMTP username
    $mail->Password = 'amanaman123';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                   // TCP port to connect to
    $mail->From = "electroshopsender@gmail.com";
    $mail->FromName = "ElectroShop Newsletter";
    $mail->addAddress($emailto);//Recipient //Name is optional
    $mail->Subject = $subjects;
    $mail->Body = $body;
    $mail->addReplyTo('electroshopsender@gmail.com', 'ElectroShop Admin');
    $mail->isHTML(true);
    $file =  $file1;
    $mail->addAttachment($file,'ElectroShop Newsletter');  
    if (!$mail->send()) {
      //  echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
    }

}

?>