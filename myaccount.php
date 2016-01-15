<!DOCTYPE html>
<?php include "top_header.php";?>
<!-- end: Top Heading Bar -->

<div class="f-space20" xmlns="http://www.w3.org/1999/html"></div>
<!-- Logo and Search -->
<?php include "main_header.php";?>
<!-- end: search -->

</div>
</div>
<!-- end: Logo and Search -->
<div class="f-space20"></div>
<!-- Menu -->
<div class="container">
    <div class="row clearfix">
        <?php include "main_bar.php";?>
        <!-- end: Navigation Buttons/Quick Cart Tablets and large screens Only -->

    </div>
</div>
</div>

</header>
<!-- end: Header -->


<div class="row clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb"> <a href="index.php"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="listorders.php"> Order History </a> </div>

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
            <!-- end: Quick Help -->

        </div>
    </div>


</div>
<!-- orderinfo from electroshop.pk -->



<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <h2>My Account</h2>
            </div>
        </div>
    </div>
</div>
<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container">
<!-- row -->
<div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block">
        <?php

        //$userName=$_SESSION['loginUser'];
        //   echo $userName;
        $query_fetch="select * from userinfo where emailAddress='$userName'";
        $result_user=mysqli_query($connection,$query_fetch);
        $row = mysqli_fetch_array($result_user);
        $firstName =$row['firstName'];
        $lastName =$row['lastName'];
        $email=$userName;
        $contact = $row['contact'];


        ?>

        <form action="updateAccountinfo.php" method="post"  onsubmit="return validationUpdate();"><!--  onsubmit="return validation();" -->
                <div class="col-lg-12 col-md-12 col-sm-12 register-account">


                    <div class="page-content">

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p><strong>Customer information</strong></p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                               <strong><p>First Name</p></strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="firstName" value="<?php echo $firstName; ?>"  class="input4" id="firstName" onblur="validationUpdate()" onkeyup="validationUpdate()" >
                            </div>
                            <div class="col-lg-3 col-m3-3 col-sm-3" >
                                <p id="fName"></p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <strong>  <p>Last Name</p> </strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="lastName"  class="input4" id="lastName" value="<?php echo $lastName; ?>" onblur="validationUpdate()" onchange="validationUpdate()" onkeyup="validationUpdate()">
                            </div>
                            <div class="col-lg-3 col-m3-3 col-sm-3" >
                                <p id="lName"></p>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <strong>    <p>E-Mail</p></strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input disabled type="email" name="emailAddress"  class="input4" id="email" value="<?php echo $email ?>"  >

                            </div>
                            <div class="col-lg-3 col-m3-3 col-sm-3" >
                                <p id="emailValid" name="emailValid" >Email Can't be changed</p>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <strong>   <p>old Password</p>  </strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="password" name="password"  class="input4" id="password_old" onkeyup="passwordValidationOld(this.value)" onblur="passwordValidationOld(this.value)">
                            </div>
                            <div class="col-lg-3 col-m3-3 col-sm-3" >
                                <p id="oldPassword"></p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                              <strong>  <p>New Password</p>  </strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="password" name="password_1"  class="input4" id="password_1" onblur="validationUpdate()" onchange="validationUpdate()" onkeyup="validationUpdate()">
                            </div>
                            <div class="col-lg-3 col-m3-3 col-sm-3" >
                                <p id="passwordValid"></p>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                              <strong> <p>confirm Password</p>  </strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="password" name="password_2"  class="input4" id="password_2" onblur="validationUpdate()" onchange="validationUpdate()" onkeyup="validationUpdate()">
                            </div>
                            <div class="col-lg-3 col-m3-3 col-sm-3" >
                                <p id="rePasswordValid"></p>
                            </div>
                        </div>





                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3">
                              <strong> <p>Contact</p></strong>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="contact" value="<?php echo $contact ?>"  class="input4" id="contact" onblur="validationUpdate()" onchange="validationUpdate()" onkeyup="validationUpdate()">
                            </div>

                            <div class="col-lg-3 col-m3-3 col-sm-3" >
                                <p id="contactValid"></p>
                            </div>
                        </div>

                        <div class="row">


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input class="big" type="submit" value="Update" name="submit">
                                <input class="big" type="reset" value="Cancel" name="cancel">
                            </div>

                            <div class="col-lg-3 col-m3-3 col-sm-3" >
                                <p id="checkForm"></p>
                            </div>
                        </div>

        </form>

</div>
</div>
    </div>







<div class="col-md-3 col-sm-12 col-xs-12 main-column box-block">
    <!-- Cart Summary -->


    <!-- end: Cart Summary -->

    <div class="clearfix f-space30"></div>
    <div class="box-heading"><span>Best Sellers</span></div>
    <!-- Best Sellers Products -->
    <?php include ("best_sellers.php"); ?>
    <!-- end: Best Sellers Products -->
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

</div>


</div>








<div class="row clearfix f-space30"></div>
<!-- footer -->
<?php include "footer.php";?>
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
        $('#menuMega').menu3d();
        $('#iview').iView({
            pauseTime: 10000,
            pauseOnHover: true,
            directionNavHoverOpacity: 0.6,
            timer: "360Bar",
            timerBg: '#2da5da',
            timerColor: '#fff',
            timerOpacity: 0.9,
            timerDiameter: 20,
            timerPadding: 1,
            touchNav: true,
            timerStroke: 2,
            timerBarStrokeColor: '#fff'
        });

        $('.quickbox').carousel({
            interval: 10000
        });
        $('#monthly-deals').carousel({
            interval: 3000
        });
        $('#productc2').carousel({
            interval: 4000
        });
        $('#tweets').carousel({
            interval: 5000
        });
    })(jQuery);



</script>
</body>
</html>