<?php
include('session.php');
include('connectdb.php');
?>

<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="noIE" lang="en-US">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <meta content="Flatroshop online shopping point" name="description">
    <meta content="logoby.us" name="author">
    <link href="images/ico.html" rel="shortcut icon">
    <title>Flatro - Online Shop Template</title>

    <!-- Reset CSS -->
    <link href="css/normalize.css" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Iview Slider CSS -->
    <link href="css/iview.css" rel="stylesheet">

    <!--	Responsive 3D Menu	-->
    <link href="css/menu3d.css" rel="stylesheet"/>

    <!-- Animations -->
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet" type="text/css" />

    <!-- Style Switcher -->
    <link href="css/style-switch.css" rel="stylesheet" type="text/css"/>
    <!-- Color -->
    <link href="css/skin/color.css" id="colorstyle" rel="stylesheet">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]> <script src="js/html5shiv.js"></script> <script src="js/respond.min.js"></script> <![endif]-->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>

    <!-- Custom Scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/total.js"></script>

    <!-- MegaMenu -->
    <script src="js/menu3d.js" type="text/javascript"></script>

    <!-- iView Slider -->
    <script src="js/raphael-min.js" type="text/javascript"></script>
    <script src="js/jquery.easing.js" type="text/javascript"></script>
    <script src="js/iview.js" type="text/javascript"></script>
    <script src="js/retina-1.1.0.min.js" type="text/javascript"></script>

    <!--[if IE 8]>
    <script type="text/javascript" src="js/selectivizr.js"></script>
    <![endif]-->

</head>

<body>
<!-- Header -->
<header>
    <!-- Top Heading Bar -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="topheadrow">
                    <ul class="nav nav-pills pull-right">


                        <li> <a href="#a"> <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-xs">My Cart</span></a> </li>
                        <li> <a href="#a"> <i class="fa fa-heart fa-fw"></i> <span class="hidden-xs">Wishlist(0)</span></a> </li>
                        <?php
                        // check whether the user is logged in or not
                        if(!isset( $_SESSION['loginUser'])){

                        $footerUserSection=false;
                        $checkCart=false;
                        $check=false;
                        ?>
                            <li> <a href="#a"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs">Signout</span></a> </li>
                        <li class="dropdown"> <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs"> Login</span></a>
                            <div class="loginbox dropdown-menu" style="height: 380px;width: 350px;"> <span class="form-header">Login</span>
                                <form method="post" action="login.php">
                                    <div class="form-group"> <i class="fa fa-user fa-fw"></i>
                                        <input class="form-control" name="emailAddress" id="InputUserName" placeholder="Username" type="text" data-validation="required">
                                    </div>
                                    <div class="form-group"> <i class="fa fa-lock fa-fw"></i>
                                        <input class="form-control" name="password" id="InputPassword" placeholder="Password" type="password" data-validation="required">
                                    </div>
                                    <button class="btn medium color1 pull-right" name="submit" type="submit">Login</button>
                                </form>
                                <form action="facebook.php">
                                    <button type="submit" class="btn medium color1 pull-left" type="submit" style="margin-top: -20px; width: 180px;margin-left: -10px">Signup</button>
                                </form>
                                    <form action="facebook.php">
                                        <button type="submit" class="btn medium color1 pull-right" type="submit" style="margin-top: 5px; width: 300px">Forget password</button>
                                    </form>
                                <form action="facebook.php">
                                    <button type="submit" class="btn medium color1 pull-right" type="submit" style="margin-top: 5px; width: 300px;background: #3b5998">Login through facebook</button>
                                </form>
                                </div>
                        </li>
                        <?php
                        }
                        else {

                        $footerUserSection=true;
                        $checkCart=true;
                        $userName=$_SESSION['loginUser'];
                        $check=true;
                        //    echo  $userName;
                        $query_fetch="select * from userinfo where emailAddress='$userName'";
                        $result_user=mysqli_query($connection,$query_fetch);
                        $row = mysqli_fetch_array($result_user);
                        $firstName =$row['firstName'];
                        $userId=$row['userId'];
                        //   echo $userId;
                        ?>
                        <li class="dropdown" > <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs"> <?php echo $firstName;?></span></a>
                            <div class="loginbox dropdown-menu" style="height: 200px;width: 265px;">
                                <form action="myaccount.php">
                                    <button type="submit" class="btn medium color1 pull-right" type="submit" style="margin-top: -35px; width: 200px">My Account</button>
                                </form>
                                <form action="listorder.php">
                                    <button type="submit" class="btn medium color1 pull-right" type="submit" style="margin-top: 0px; width: 200px">Order History</button>
                                </form>
                                <form action="logout.php">
                                    <button type="submit" class="btn medium color1 pull-right" type="submit" style="margin-top: 5px; width: 200px">Logout</button>
                                </form>
                            </div>
                        </li>
                        <?php }// end of else?>
                    </ul>
                </div>
            </div>
        </div>
    </div>