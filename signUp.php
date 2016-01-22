<!DOCTYPE html>

<script type="text/javascript" src="js\validation.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php include "top_header.php";?>
<div class="f-space20"></div>
<!--  -->
<?php include "main_header.php";?>
<?php include "connectdb.php"?>

<!-- end: Logo and Search -->
<div class="f-space20"></div>
<!-- Menu -->
<div class="container">
    <div class="row clearfix">
        <?php include "main_bar.php";?>
    </div>
    <div id="successModal" class="modal fade modal-success" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body" style="background:green">
                    <h4 style="text-align: center">Enter Valid Field</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb"> <a href="index.php"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="SignUp.php"> Sign Up </a></div>
                <!-- Quick Help for tablets and large screens -->
                <div class="quick-message hidden-xs">
                    <div class="quick-box">
                        <div class="quick-slide"> <span class="title">Help</span>
                            <div class="quickbox slide" id="quickbox">
                                <div class="carousel-inner">
                                    <div class="item active"> <a href="#"> <i class="fa fa-envelope fa-fw"></i> Quick Message</a> </div>
                                    <div class="item"> <a href="#"> <i class="fa fa-question-circle fa-fw"></i> FAQ</a> </div>
                                    <div class="item"> <a href="#"> <i class="fa fa-phone fa-fw"></i> (92)3009712255</a> </div>
                                </div>
                            </div>
                            <a class="left carousel-control" data-slide="prev" href="#quickbox"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="right carousel-control" data-slide="next" href="#quickbox"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix f-space10"></div>

    <div class="col-lg-12">
        <div class="col-lg-9">
            <div class="row clearfix f-space10"></div>
            <div class="box-heading"><span>YOUR ACCOUNT DETAILS</span></div>

            <div class="contactform" >

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p><strong>If you are already registered please login here

                        </strong></p>
                </div>
                <form  method="post" action="login.php">
                    <div class="row">
                        <div class="col-lg-11 col-md-11 col-sm-6 ">
                            <div class="row">

                                <div class="col-lg-5 col-md-9 col-sm-6">
                                    <input class="input4 " type="email" id="firstName" name="emailAddress" placeholder="Email*" required=""  >

                                </div>

                                <div class="col-lg-5 col-md-9 col-sm-6">
                                    <input type="password" class="input4" id="lastName" name="password" placeholder="Password*"required="" >
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12" style="padding-bottom: 1%">
                            <input class="btn large color2 pull-left" type="submit" value="Login" name="submit">
                            </div>
                        <div class="col-md-12">

                        <a href="facebook.php" class="btn large color2 pull-left" type="" style="background: #0075b0;" value="Login Through Facebook" name="facebook">Login Through Facebook</a>

                        </div>

                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-3 " style="margin-left:-50px ;margin-top:10px ">
            <div class="container ">
                <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
                    <div class="box-heading"><span>Best Sellers</span></div>
                    <!-- Best Sellers Products -->
                    <div class="box-content">
                        <?php include "best_sellers.php";?>
                    </div>
                    <!-- end: Best Sellers Products -->
                    <!-- Special Product Start Products -->

                    <!-- end: special product -->
                    <div class="clearfix f-space10"></div>
                </div>
                <div class="clearfix f-space10"></div>
                <?php include "specials.php";?>
            </div>

            <div class="clearfix f-space10"></div>

        </div>
    </div>


    <div class="col-lg-12">
        <div class="col-lg-9">
        <div class="row clearfix f-space10"></div>
        <div class="box-heading"><span>Register</span></div>

        <div class="contactform" >

            <div class="col-lg-12 col-md-12 col-sm-12">
                <p><strong>Customer information</strong></p>
            </div>
            <form  method="post" action="register_user.php" onsubmit="return validation();">
                <div class="row">
                    <div class="col-lg-11 col-md-11 col-sm-6 ">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h5 style="margin-top: 30px">First Name</h5>
                            </div>
                            <div class="col-lg-5 col-md-9 col-sm-6">
                                <input class="input4" id="firstName" name="fName" placeholder="First Name*" onblur="validation()" onkeyup="validation()" >

                            </div>
                            <div class="col-lg-3 col-md-9 col-sm-6">
                                <p id="fName1"style="text-align: center;margin-top: 20px"></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-11 col-md-11 col-sm-6 ">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h5 style="margin-top: 30px">Last Name</h5>
                            </div>
                            <div class="col-lg-5 col-md-9 col-sm-6">
                                <input class="input4" id="lastName" name="lName" placeholder="Last Name*" onblur="validation()" onkeyup="validation()" >

                            </div>
                            <div class="col-lg-3 col-md-9 col-sm-6">
                                <p id="lName1"style="text-align: center;margin-top: 20px"></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-11 col-md-11 col-sm-6 ">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h5 style="margin-top: 30px">Email</h5>
                            </div>
                            <div class="col-lg-5 col-md-9 col-sm-6">
                                <input  class="input4" id="emailid" name="email" placeholder="xxx@xxx.xxx*" onkeyup="checkEmail(this.value)" onblur="checkEmail(this.value)" onchange="checkEmail(this.value)" >

                            </div>
                            <div class="col-lg-3 col-md-9 col-sm-6">
                                <p id="emailValid"style="text-align: center;margin-top: 20px" > </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-11 col-md-11 col-sm-6 ">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h5 style="margin-top: 30px">Password</h5>
                            </div>
                            <div class="col-lg-5 col-md-9 col-sm-6">
                                <input type="password" class="input4" id="passwordid" name="password" placeholder="Password*"  onblur="validation()" onkeyup="validation()">

                            </div>
                            <div class="col-lg-3 col-md-9 col-sm-6">
                                <p id="passwordValid"style="text-align: center;margin-top: 20px"></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-11 col-md-11 col-sm-6 ">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <h5 style="margin-top: 30px">Contact Number</h5>
                            </div>
                            <div class="col-lg-5 col-md-9 col-sm-6">
                                <input class="input4" id="contactid" name="contact" placeholder="Contact Number*" onblur="validation()"onkeypress="return event.charCode > 47 && event.charCode < 58;"  onkeyup="validation()" >

                            </div>
                            <div class="col-lg-3 col-md-9 col-sm-6">
                                <p id="contactValid"style="text-align: center;margin-top: 20px"></p>

                            </div>
                        </div>
                    </div>


                </div>


                <div class="row">
                    <div class="col-md-12">
                        <input class="btn large color2 pull-right" type="submit" value="Register" name="submit">
                    </div>

                </div>
                <div class="col-lg-12 col-md-12 col-sm-12" id="validationfield" style="background: #f5f5f5;height: 40px;margin-top: 20px" >
                    <p id="checkForm"style="text-align: center;margin-top: 10px;font: bold"></p>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-3 " style="margin-left:-50px ;margin-top:10px ">
        <div class="container ">
            <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
                <div class="box-heading"><span>Best Sellers</span></div>
                <!-- Best Sellers Products -->
                <div class="box-content">
                    <?php include "best_sellers.php";?>
                </div>
                <!-- end: Best Sellers Products -->
                <!-- Special Product Start Products -->

                <!-- end: special product -->
                <div class="clearfix f-space10"></div>
            </div>
            <div class="clearfix f-space10"></div>
            <?php include "specials.php";?>
        </div>

    <div class="clearfix f-space10"></div>

    </div>
</div>
</div>

<!-- end: container-->

<div class="row clearfix f-space10"></div>
<!-- footer -->
<?php include("footer.php");?><!-- end: footer -->

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
        $('#menuMega').menu3d();
        //Google Maps Configuration
        var lat="33.71815";
        var lon="73.06055";
        $('#map').gmap3({
            map:{
                options:{
                    center: [lat, lon],
                    zoom: 14
                }
            },
            marker:{
                latLng: [lat, lon]
            }
        });

        //Help/Contact Number/Quick Message
        $('.quickbox').carousel({
            interval: 10000
        });

        //Best Sellers
        $('#productc4').carousel({
            interval: 4000
        });

    })(jQuery);


</script>
</body>
</html>