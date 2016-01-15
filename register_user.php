<?php


require_once 'admin/PHPMailer-master/PHPMailerAutoload.php';
require_once 'admin/PHPMailer-master/class.smtp.php';

include('connectdb.php');
//session_start();

if(isset($_POST['submit']))
{
    if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['fName']) || empty($_POST['lName'])  ) {
       // header("location: create_an_account.php");
    }
    else
    {
        $user_name=$_POST["email"];
        $password=$_POST["password"];
        $firstName=$_POST["fName"];
        $lastName=$_POST["lName"];
        $contact=$_POST["contact"];

        $query="insert into userinfo (firstName, lastName, emailAddress, password, contact) VALUES ('$firstName','$lastName','$user_name','$password',$contact)";
        $result=mysqli_query($connection,$query);

        if($result)
        {
        //   $_SESSION['loginUser']=$user_name;
         //   $_SESSION['loginId']=$db_userId;
            $subjects="Welcome To Electroshop.pk";
            $body='<a href="http://www.electroshop.pk"><img width="300px" height="100px" alt="PHPMailer" src="cid:my-attach"></a>'.'<br>'."Welcome and thank you for registering at Electroshop Pakistan!" . '<br><br>'."Your account has now been created and you can log in by using your email address and".'<br>'." password by visiting our website or at the following URL:".'<br>'."<a      href='http://electroshop.pk/create_an_account.php'>http://electroshop.pk/create_an_account.php</a>".'<br><br>'."Upon logging in, you will be able to access other services including reviewing past orders,".'<br>'."printing invoices and editing your account information.".'<br>'."Thanks,".'<br>'.
                "Electroshop Pakistan".'<br>'."<img src='photo/electroshop logo'  /><br/>";

            mailsend($subjects, $user_name, $body, $firstName, $lastName);
            header("location: index.php");
            mysqli_close($connection); // Closing Connection


        }
        else
        {

            header("location: signUp.php");

            throw new Exception("Problem in Query");

        }




    }

}
function mailsend($subjects, $emailto,$body, $fName, $lName)
{
    $mail = new PHPMailer;
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->isSMTP();
    $mail->SMTPAuth = true;                             // Enable SMTP authentication
    $mail->Username = 'techagentx@gmail.com';                 // SMTP username
    $mail->Password = 'techagentx';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                   // TCP port to connect to
    $mail->From = "techagentx@gmail.com";
    $mail->FromName = "techagentx";
    $mail->addAddress($emailto);//Recipient //Name is optional
    $mail->Subject = $subjects;
    $mail->AddEmbeddedImage("photo/electroshop_logo.png", "my-attach", "photo/electroshop_logo.png");

    $mail->Body = $body;
    $mail->addReplyTo('techagentx@gmail.com', 'ElectroShop Admin');
    $mail->isHTML(true);
    if (!$mail->send()) {
        //  echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
    }

}


?>