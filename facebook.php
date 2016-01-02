<?php
include('session.php');
include('connectdb.php');
/* INCLUSION OF LIBRARY FILEs*/
require_once( 'lib/Facebook/FacebookSession.php');
require_once( 'lib/Facebook/FacebookRequest.php' );
require_once( 'lib/Facebook/FacebookResponse.php' );
require_once( 'lib/Facebook/FacebookSDKException.php' );
require_once( 'lib/Facebook/FacebookRequestException.php' );
require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
require_once( 'lib/Facebook/GraphObject.php' );
require_once( 'lib/Facebook/GraphUser.php' );
require_once( 'lib/Facebook/GraphSessionInfo.php' );
require_once( 'lib/Facebook/Entities/AccessToken.php');
require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

/* USE NAMESPACES */

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Facebook\FacebookHttpable;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookCurl;

/*PROCESS*/

//1.Stat Session


//check if users wants to logout
if(isset($_REQUEST['logout'])){
    unset($_SESSION['fb_token']);
}

//2.Use app id,secret and redirect url
$app_id = '1119371311414975';
$app_secret = 'b1deed597b5fa3b766e3c3c04d4ca20a';

$redirect_url='http://localhost:63342/dukanonline/facebook.php';

//3.Initialize application, create helper object and get fb sess
FacebookSession::setDefaultApplication($app_id,$app_secret);
$helper = new FacebookRedirectLoginHelper($redirect_url);
try {
    $sess = $helper->getSessionFromRedirect();
} catch(Exception $e) {

}
//check if facebook session exists
if(isset($_SESSION['fb_token'])){
    $sess = new FacebookSession($_SESSION['fb_token']);


    try{
        $sess->validate($app_id,$app_secret);
    }catch(FacebookAuthorizationException $e){
        $sess = '';
    }
}

//logout
//$logout = 'http://localhost:63342/newfblogin&logout=true';
$logout = 'http://localhost:63342/dukanonline/facebook.php?logout=true﻿';
//$logout = 'http://localhost:63342/facebook/index.php?logout=true﻿';
//4. if fb sess exists echo name
if(isset($sess)){
    //store the token in the php session
    $_SESSION['fb_token']=$sess->getToken();
    //create request object,execute and capture response
    $request = new FacebookRequest($sess,'GET','/me');
    // from response get graph object
    $response = $request->execute();
    $graph = $response->getGraphObject(GraphUser::classname());
    // use graph object methods to get user details
    $name = $graph->getName();
    $id = $graph->getId();
    $link = $graph->getLink();
    $namespace = explode(' ', $name);
    $image = 'https://graph.facebook.com/'.$id.'/picture?width=300';
    $email = $graph->getProperty('email');
    $firstName = $namespace[0];
    $lastName = $namespace[1];
    $user_name = $id;
    //	echo "$id <br>";
    //   echo "hi $namespace[0] <br>";
    //   echo "hi $namespace[1] <br>";
    //	echo "<img src='$image' /><br><br>";
    //	echo "<a href='".$logout."'><button>Logout</button></a>";

    $sql="select userId,emailAddress from userinfo where emailAddress='$id'";
    $result=mysqli_query($connection,$sql);
    $table_record=mysqli_fetch_array($result);
    $db_userId=$table_record['userId'];
    $db_email=$table_record['emailAddress'];
    if($db_userId == null){
        //echo "123";

        $query="insert into userinfo (firstName, lastName, emailAddress) VALUES ('$firstName','$lastName','$user_name')";

        try{
            $result=mysqli_query($connection,$query);
            if($result)
            {
                //echo "login new user in database";

                $_SESSION['loginUser']=$user_name;

                header("location: index.php");

            }
            else
            {

                header("location: register.php");

                throw new Exception("Problem in Query");

            }

        }

        catch (Exception $e){
            $e->getMessage();
        }

    }else{


        $_SESSION['loginUser']=$db_email;
        //echo  $db_email;
        $_SESSION['loginId']=$db_userId;
        // echo "login and user is already in database";

        header("location: index.php");
    }


    mysqli_close($connection);

}else{
    $login_url = $helper->getLoginUrl(array('email'));
    ?>

    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>buymore.pk</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<style>
    body{
        background:#f8f8f8;
    }
	.main-container{
        width:400px;
		margin:30px auto 0px;
		background:white;
		padding:30px;
	}
	.footer{
        background:#ecf0f1;
        padding:30px;
		color:#7f8c8d;
		width:400px;
		margin: 0px auto;
	}
	</style>
  </head>
  <body>
  	<div class="main-container">

	    <h1>FACEBOOK LOGIN</h1>
	    <p>Login through facebook will take your personel information such as name email and picture but it will not harm your privacy.</p>
	    <a href="<?php echo $login_url; ?>"><button class="btn btn-primary">Login with facebook</button></a>
            <a href="index.php"><button class="btn btn-danger">Cancel</button></a>


    </div>
	<div class="footer">a <a href="http://techagentx.com">Techagentx</a> production</div>
  </body>
</html>

<?php
    //else echo login
    // $helper->getLoginUrl(array('email')).click();
    //echo '<a id="face" href="'.$helper->getLoginUrl(array('email')).'" >want to login through facebook.</a>';

    //document.getElementById('facelink').click();
}
?>