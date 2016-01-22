<!DOCTYPE html>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<?php include "top_header.php";
?>
<div class="f-space20"></div>
<!--  -->
<?php include "main_header.php";?>
<!-- end: Logo and Search -->
<div class="f-space20"></div>
<!-- Menu -->
<div class="container">
            <div class="row clearfix">
                <?php include "main_bar.php";?>
            </div>
            <div class="row clearfix"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb"> <a href="index.php"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="Contact.php"> Contact </a></div>
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

<!-- Page title -->

<!-- end: Page title -->
            <div class="row clearfix f-space10"></div>

        <div class="container">
            <div class="row">

                <div class="col-md-9 col-sm-12 col-xs-12 box-block page-sidebar">

    <div class="contactform" >
                    <h2 class="title">Contact Form</h2>
                    <p>Contact us in case of any query.</p>
                    <form  method="post" action="#  ">
                        <div class="row">
                            <div class="col-md-5">
                                <input class="input4" id="name1" name="name" placeholder="Name*"  required>
                                <input type="email" class="input4" id="email1"  name="email" value="" placeholder="Email*" required>
                                <input class="input4" id="subject1"maxlength="50" name="subject" value="" placeholder="Subject"required>
                            </div>
                            <div class="col-md-7">
                                <textarea class="input4" name="message" id="message1" rows="8" cols="60" placeholder="Message" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                               <button class="btn large color2 pull-right" name="submit" type="submit"   >Send Now</button>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
            <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
                <div class="box-heading"><span>Contact Details</span></div>
                <!-- Contact Details -->
                <div class="box-content contactdetails-box-wr">
                    <br>
                    <div class="contactdetails-box"> <span class="icon"><i class="fa fa-map-marker fa-fw"></i></span>
                        <div class="details">

                            <h1>Logoby.us</h1>
                            1234 Street,<br/>
                            Collage Road, Islamabad, <br/>
                            PK 46000</div>
                    </div>
                    <br>
                    <div class="contactdetails-box">
                        <span class="icon"><i class="fa fa-phone fa-fw"></i></span> <span class="details">Phone: 92 300 9712255 <br/>
                                Fax:  92 300 9716116</span>

                    </div>
                    <br>
                    <div class="contactdetails-box">
                        <span class="icon"><i class="fa fa-envelope fa-fw"></i></span> <span class="details">Email: themes@logoby.us <br/>
                                 Website: www.logoby.us</span>
                    </div>

                </div>

                <!-- end: Contact Details -->
            </div>
        </div>
                </div></div>
            <div id="successModal" class="modal fade modal-success" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body"  id ="mails" style="background:green">
                        </div>
                    </div>

                </div>
            </div>
    <!-- end:row -->
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
<?php

if(isset($_POST["submit"]))
    {
        require 'admin/PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $Name=$_POST["name"];                               // Enable verbose debug output
        $Email=$_POST["email"];
        $Subject=$_POST["subject"];
        $Message=$_POST["message"];
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'techagentx@gmail.com';                 // SMTP username
        $mail->Password = 'muazahmad';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                   // TCP port to connect to
        $mail->setFrom('', 'Mailer');
        $mail->addAddress('techagentx@gmail.com'); // Add a recipient
        $mail->addReplyTo($Email, 'Information');
        $mail->isHTML(true);                                 // Set email format to HTML
        $mail->Subject = $Subject;
        $mail->Body    = 'Message from electroshop.pk'."<br><br>".'From: '.$Email."<br>".'Name: '.$Name."<br>".'Message: '. $Message."<br><br>".'Powered by TechAgentx';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    ?>
        <script>
            notie.alert(3, 'Wish Added!', 1);
        </script>
    <?php
        if(!$mail->send()) {
            ?><script>alert("mail not been sent")</script><?php

        }else{
            ?><script>alert("mail has been sent")</script><?php
        }
    }
?>
</body>
</html>