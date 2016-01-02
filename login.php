<?php


include('connectdb.php');

//session_start();
if(isset($_POST['submit']))
{
    if (empty($_POST['emailAddress']) || empty($_POST['password'])) {
        header("location: contact.php");
    }
    else{
        $user_name=$_POST["emailAddress"];
        $password=$_POST["password"];
        /*
                $user_name = stripslashes($user_name);
                $password = stripslashes($password);
                $user_name = mysql_real_escape_string($user_name);
                $password = mysql_real_escape_string($password);
        */


        $query="select * from userinfo where emailAddress='$user_name' and password='$password'";
        try{
            $result=mysqli_query($connection,$query);
            // Redirecting To Other Page

            $table_record=mysqli_fetch_array($result);
            $db_username=$table_record['emailAddress'];
            $db_password=$table_record['password'];
            $db_userId=$table_record['userId'];

            if($user_name==$db_username and $password==$db_password){
                $_SESSION['loginUser']=$user_name;
                $_SESSION['loginId']=$db_userId;
                // $_SESSION['loginId']=$db_userId;
                header("location: index.php");

            }
            else
            {
                header("location: create_an_account.php");
                echo "<br><strong style='color: white'> Incorrect Password </strong>";
                throw new Exception("Problem in Query");

            }

        }

        catch (Exception $e){
            $e->getMessage();
        }
    }
}
mysqli_close($connection); // Closing Connection

?>