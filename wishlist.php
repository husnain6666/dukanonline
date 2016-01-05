<!DOCTYPE html>
<?php
include('session.php');
include('connectdb.php');
include "top_header.php";?>
<!-- end: Top Heading Bar -->

<div class="f-space20"></div>
<!-- Logo and Search -->
<?php include "main_header.php";?>
<!-- end: Logo and Search -->
<div class="f-space20"></div>
<!-- Menu -->
<div class="container">

    <div class="row clearfix">
        <?php include "main_bar.php";?>
        </div>

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
    <script src="js/total.js"></script>

    <!-- Custom Scripts -->
    <script src="js/scripts.js"></script>

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


<div class="row clearfix"></div>

<div class="row clearfix f-space10"></div>
<!-- Shop Page title -->

<!-- end: Shop Page title -->
<div class="row clearfix f-space10"></div>
<div class="container">
    <!-- row -->
    <div class="row">

        <!-- side bar -->
        <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
            <div><?php include("best_sellers.php"); ?></div>
            <div class="clearfix f-space30"></div>
            <div><?php include("specials.php"); ?></div>

            <div class="clearfix f-space30"></div>
            <!-- Get Updates Box -->
            <div class="box-content">
                <div class="subscribe">
                    <div class="heading">
                        <h3>Get updates</h3>
                    </div>
                    <div class="formbox">
                        <form>
                            <i class="fa fa-envelope fa-fw"></i>
                            <input class="form-control" id="InputUserEmail" placeholder="Your e-mail..." type="text">
                            <button class="btn color1 normal pull-right" type="submit">Sign
                                up</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end: Get Updates Box -->
        </div>
        <!-- end:sidebar -->
        <div class="col-md-9 col-sm-12 col-xs-12 box-block">
            <div class="box-heading category-heading"><span>Showing 1-9 of 240 products</span>
                <ul class="nav nav-pills pull-right">
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> 9 per page <i class="fa fa-sort fa-fw"></i> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#a">12 per page</a></li>
                            <li><a href="#a">15 per page</a></li>
                            <li><a href="#a">18 per page</a></li>
                            <li><a href="#a">21 per page</a></li>
                            <li><a href="#a">100 per page</a></li>
                            <li><a href="#a">Show all</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> Sort by <i class="fa fa-sort fa-fw"></i> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#a">Name (A-Z)</a></li>
                            <li><a href="#a">Name (Z-A)</a></li>
                            <li><a href="#a">Price (Low-High)</a></li>
                            <li><a href="#a">Price (High-Low)</a></li>
                            <li><a href="#a">Rating Highest</a></li>
                            <li><a href="#a">Rating Lowest</a></li>
                            <li><a href="#a">Recent</a></li>
                        </ul>
                    </li>
                    <li class="view-list active"> <a href="category-list.html"> <i class="fa fa-list-ul fa-fw"></i></a> </li>
                    <li class="view-grid"> <a href="category-grid.html"> <i class="fa fa-th-large fa-fw"></i></a> </li>
                </ul>
            </div>
            <div class="row clearfix f-space20"></div>
            <div class="box-content">
                <div class="box-products">


                    <?php
                    $userId = 0;
                    if(isset($_SESSION['loginId']))
                    {
                        $userId = $_SESSION['loginId'];
                    }
                    $sql = "SELECT wishId,articleId from wishlist where userId='$userId' " ;
                    $result=mysqli_query($connection,$sql);
                    while($table_record=mysqli_fetch_array($result)){
                    $articleId = $table_record['articleId'];
                    $wishId = $table_record['wishId'];


                    $sql1 = "SELECT discount,articleName,Category,picture1,price,brand,quantity FROM article where articleId='$articleId' and active = 1";
                    $result1=mysqli_query($connection,$sql1);
                    $table_record=mysqli_fetch_array($result1);

                    $articleName = $table_record['articleName'];
                    $Category = $table_record['Category'];
                    $picture1=$table_record['picture1'];
                    $price = $table_record['price'];
                    $brand = $table_record['brand'];
                    $quantity=$table_record['quantity'];
                        $discount = $table_record['discount'];
                        $discountedPrice = 0;
                        $discountedPrice = ($price * $discount)/100;
                        $discountedPrice = $price - $discountedPrice;

                    $query2="SELECT count(articleId) as totalReviews FROM reviews WHERE articleId = '$articleId'";
                    $result2=mysqli_query($connection,$query2);

                    $table_record2=mysqli_fetch_array($result2);
                    $totalReviews = $table_record2['totalReviews'];
                    ?>



                    <!-- Product Row -->
                    <div class="row list-product">
                        <!-- Product -->
                        <!-- Image -->
                        <div class="col-md-4 col-sm-12 col-xs-12 product-image">
                            <div class="image">
                                <a class="img" href="#"><img alt="product info" src="photo/<?php echo $picture1 ?>" title=<?php echo $articleName; ?> class="ani-image" ></a> </div>
                        </div>
                        <!-- end: Image -->

                        <div class="col-md-8 col-sm-12 col-xs-12 product-title" >
                            <div class="producttitle">
                                <h1 ><a href="#"><?php echo $articleName; ?></a></h1>



                            <?php
                            $ratingLimit = 0;
                            $query3 = "select (select count(rating) from ratings where articleId = '$articleId') as totalRating, SUM(rating) as sumRating from ratings where articleId = '$articleId'";

                            $result3 = mysqli_query($connection, $query3);

                            $table_record3 = mysqli_fetch_array($result3);
                            $totalRatings = $table_record3['totalRating'];
                            $ratingSum = $table_record3['sumRating'];
                            if ($totalRatings != 0 || $ratingSum != 0) {
                                $avgRating = $ratingSum / $totalRatings;
                            } else {
                                $avgRating = 5;
                            }
                            ?>
                            <div class="rating"><?php
                                while ($ratingLimit < 5) {
                                    if ($ratingLimit < $avgRating) {
                                        ?>
                                        <i class="fa fa-star"></i>
                                    <?php } else {
                                        ?>
                                        <i class="fa fa-star-o"></i>
                                    <?php
                                    }
                                    $ratingLimit++;
                                }?>
                                <span class="reviews-info"><?php echo 'Reviews='.$totalReviews?> </span> </div>
                        </div>

</div>


                        <div class="col-md-3 col-sm-4 col-xs-12 product-price" style="height: 50px">
                            <?php if($discount>0){ ?>
                                <div class="big-price" style="font-size: 15px"> <span class="price-old" style="margin-top: 28px">Rs. <?php echo $price?></span> <span class="price-new" style="font-size: 20px">Rs. <?php echo $discountedPrice?></span> </div>
                            <?php }else { ?>
                                <div class="big-price" style="font-size: 15px"><span class="price-new" style="font-size: 20px">Rs. <?php echo $price?></span> </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-5 col-sm-8 col-xs-12 product-meta" style="height: 50px">
                            <div class="productmeta">
                                <div class="category-list-btns" style="margin-top: 35px">
                                    <button class="btn normal btn-addtocart pull-left" style="font-size: 15px"> <i class="fa fa-shopping-cart fa-fw"></i> Add to Cart </button>
                                    <button class="btn normal btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa normal fa-retweet fa-fw"></i> </button>
                                    <button class="btn normal btn-danger pull-left" style="background: red;color: #ffffff;font-size: 16px" onclick="removewish(<?php echo $articleId ?>)">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end: Product Row -->

                    <div class="row clearfix f-space20"></div>
                        <div class="row clearfix f-space20"></div>

                    <?php  }    ?>

                </div>
            </div>
            <div class="clearfix f-space30"></div>
            <span class="pull-left">Showing 1-9 of 240 products</span>
            <div class="pull-right">
                <ul class="pagination pagination-lg">
                    <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li  class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>


    </div>
    <!-- end:row -->
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>
<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-12 shopinfo">
                <h4 class="title">FLATSHOP</h4>
                <p> This Efficiently negotiate robust communities with extensible systems.
                    Appropriately productize top-line leadership skills rather than team
                    building applications.</p>
                <p> Phosfluorescently extend highly efficient schemas with intermandated. </p>
            </div>
            <div class="col-sm-3 col-xs-12 footermenu">
                <h4 class="title">Information</h4>
                <ul>
                    <li class="item"> <a href="#a">Delivery Info</a></li>
                    <li class="item"> <a href="#a">FAQs</a></li>
                    <li class="item"> <a href="#a">Payment Instructions</a></li>
                    <li class="item"> <a href="#a">Request Product</a></li>
                    <li class="item"> <a href="#a">Vendor Registration</a></li>
                    <li class="item"> <a href="#a">Affiliates</a></li>
                    <li class="item"> <a href="#a">Gift Vouchers</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-12 footermenu">
                <h4 class="title">My
                    account</h4>
                <ul>
                    <li class="item"> <a href="#a">My Account</a></li>
                    <li class="item"> <a href="#a">Order History</a></li>
                    <li class="item"> <a href="#a">Wish List</a></li>
                    <li class="item"> <a href="#a">Newsletter</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-12 getintouch">
                <h4 class="title">get in
                    touch</h4>
                <ul>
                    <li>
                        <div class="icon"> <i class="fa fa-map-marker fa-fw"></i> </div>
                        <div class="c-info"> <span>3rd Avenue, NY, US<br>
              <a href="#a">Find us on map</a></span> </div>
                    </li>
                    <li>
                        <div class="icon"> <i class="fa fa-envelope-o fa-fw"></i> </div>
                        <div class="c-info"> <span>Email Us At:<br>
              <a href="#a">support@domain.com</a></span> </div>
                    </li>
                    <li>
                        <div class="icon"> <i class="fa fa-phone fa-fw"></i> </div>
                        <div class="c-info"> <span>24/7 Phone Support:<br>
              <a href="#a">+1 (888) 888 8888</a></span> </div>
                    </li>
                    <li>
                        <div class="icon"> <i class="fa fa-skype fa-fw"></i> </div>
                        <div class="c-info"> <span>Talk to Us:<br>
              <a href="#a">skypeid</a></span> </div>
                    </li>
                </ul>
                <div class="social-icons">
                    <ul>
                        <li class="icon google-plus"> <a href="#a"> <i class="fa fa-google-plus fa-fw"></i> </a> </li>
                        <li class="icon linkedin"> <a href="#a"> <i class="fa fa-linkedin fa-fw"></i> </a> </li>
                        <li class="icon twitter"> <a href="#a"> <i class="fa fa-twitter fa-fw"></i> </a> </li>
                        <li class="icon facebook"> <a href="#a"> <i class="fa fa-facebook fa-fw"></i> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-xs-12"> <span class="copytxt">&copy; Copyright 2013 by <a href="#a">Flatro</a> - All rights reserved</span> <span class="btmlinks"><a href="#a">Return Policy</a> | <a href="#a">Privacy Policy</a> | <a href="#a">Terms of Use</a></span> </div>
                <div class="col-lg-4 col-sm-4 col-xs-12 payment-icons"> <a href="#a"> <img alt="discover" src="images/icons/discover.png"> </a> <a href="#a"> <img alt="2co" src="images/icons/2co.png"> </a> <a href="#a"> <img alt="paypal" src="images/icons/paypal.png"> </a> <a href="#a"> <img alt="master card" src="images/icons/mastercard.png"> </a> <a href="#a"> <img alt="visa card" src="images/icons/visa.png"> </a> <a href="#a"> <img alt="moneybookers" src="images/icons/moneybookers.png"> </a> </div>
            </div>
        </div>
    </div>
</footer>
<!-- end: footer -->
<!-- Style Switcher JS -->
<script src="js/style-switch.js" type="text/javascript"></script>
<section id="style-switch" class="bgcolor3">
    <h2>Style Switch <a href="#" class="btn color2"><i class="fa fa-cog "></i></a></h2>
    <div class="inner">
        <h3>Predefined Styles</h3>
        <ul class="colors list-unstyled" id="color1">
            <li><a href="#" class="blue-red" data-toggle="tooltip" title="Blue Red" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="midnight-blue" data-toggle="tooltip" title="Midnight Blue" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="mono-red" data-toggle="tooltip" title="Mono Red" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="pinegreen-purple" data-toggle="tooltip" title="PineGreen Purple" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="darkmagenta-rosybrown" data-toggle="tooltip" title="DarkMagenta RosyBrown" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="darkorchid-seagreen" data-toggle="tooltip" title="DarkOrchid SeaGreen" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="steel-blue" data-toggle="tooltip" title="Steel Blue" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="cadetblue-violetred" data-toggle="tooltip" title="CadetBlue VioletRed" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="mediumpurple-seagreen" data-toggle="tooltip" title="MediumPurple SeaGreen" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="steelblue-leafgreen" data-toggle="tooltip" title="SteelBlue LeafGreen" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="orange-steelblue" data-toggle="tooltip" title="Orange SteelBlue" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
            <li><a href="#" class="gray" data-toggle="tooltip" title="Gray" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
        </ul>
    </div>
    <div id="reset" class="inner"><a href="#" class="btn normal color2 ">Reset</a></div>
</section>

<script>

    (function($) {
        "use strict";
        //Mega Menu
        $('#menuMega').menu3d();

        //Help/Contact Number/Quick Message
        $('.quickbox').carousel({
            interval: 10000
        });


        //Filter by Price Slider
        $("#price-range").ionRangeSlider({
            min: 100,                        // min value
            max: 1000,                       // max value
            from: 200,                       // overwrite default FROM setting
            to: 600,                         // overwrite default TO setting
            type: "double",                 // slider type
            step: 50,                       // slider step
            postfix: "",             		// postfix text
            hasGrid: false,                  // enable grid
            hideMinMax: false,               // hide Min and Max fields
            hideFromTo: false,               // hide From and To fields
            prettify: false,                 // separate large numbers with space, eg. 10 000
            onChange: function(obj){        // function-callback, is called on every change
                console.log(obj);
            },
            onFinish: function(obj){        // function-callback, is called once, after slider finished it's work
                console.log(obj);
            }
        });



    })(jQuery);

</script>

</body>
</html>