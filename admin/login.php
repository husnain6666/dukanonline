<?php
include_once('dbConnect.php');
session_start();

if(isset($_SESSION['USERNAME'])){
header("location: data.php");	
}

if(isset($_POST['submit1'])){
$username = $_POST['username'];
$password = $_POST['password'];
//echo $username;
  //  echo $password;
$query = "SELECT * FROM userinfo WHERE emailAddress = '$username' AND password = '$password'";
$result = mysqli_query($CONNECTION, $query);

if($result) {


        $member = mysqli_fetch_array($result);
        $_SESSION['USER_ID'] = $member['userId'];
        $_SESSION['USERNAME'] = $member['emailAddress'];
//echo $_SESSION['USERNAME'];
  //  echo  $_SESSION['USER_ID'];
   header("location: data.php");
        


    }

else {
    header("location: login.php");
}
}	  
      ?>
<html>
  <head>
      
      
    <meta charset="UTF-8">
    <title>Electroshop | Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="lockscreen">
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <a href="login.php"><b>ElectroSh</b>op</a>
      </div>
      <!-- User name -->
      <div class="lockscreen-name">Admin</div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="dist/img/adminlogo1.png" alt="User Image" />
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form action="" method="post" class="lockscreen-credentials" >
          <div class="input-group">
            <input type="hidden" class="form-control" value='electroshop' placeholder="password" name="username" />
            <input type="password" class="form-control" placeholder="password" name="password"/>
            <div class="input-group-btn">
              <button type="submit" name="submit1" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form>
		<!-- /.lockscreen credentials -->

      </div><!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Enter your password to start your session
      </div>
      <div class="lockscreen-footer text-center">
       
      </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
