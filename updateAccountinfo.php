<?php include('connectdb.php');
include('session.php');
?>
    <head><script type="text/javascript" src="js/validation.js"></script></head>

<?php



$userName=$_SESSION['loginUser'];

if(isset($_POST['submit']))
{
     //   $user_name=$_POST["emailAddress"];
        $password=$_POST["password"];
echo        $firstName=$_POST["firstName"];
echo        $lastName=$_POST["lastName"];
 echo       $contact=$_POST["contact"];

        $sql="update userinfo set firstName='$firstName', lastName='$lastName', contact='$contact' where emailAddress='$userName'";
        $result=mysqli_query($connection,$sql);


    $oldPassword=$_POST["password"];
    $newPassword=$_POST["password_1"];
    $rePassword=$_POST["password_2"];


if(isset($oldPassword) & isset($newPassword) & isset($rePassword)){
    $sql = "UPDATE userinfo SET password='$newPassword' WHERE emailAddress='$userName'";
    $result=mysqli_query($connection,$sql);
}
}



    header('Location: myaccount.php');




mysqli_close($connection); // Closing Connection

?>