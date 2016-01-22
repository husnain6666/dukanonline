<!DOCTYPE html>
<?php include "connectdb.php";?>

<?php include "top_header.php";?>
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
                <div class="breadcrumb"> <a href="index.php"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="services.php"> Services</a></div>
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
    <div class="col-lg-12 col-md-9 col-sm-12 col-xs-12 main-column box-block">
        <div class="box-heading"><span>SERVICES & PARTS</span></div>
        <div class="breadcrumbs" style="background: #f5f5f5;margin-top: -10px">
            <p><a href="#"> <strong style="color: red">PLEASE CONTACT US ON:&nbsp; <span style="color: green">0314-1577767</span> &nbsp;FOR THESE PARTS & SERVICES</strong></a> </p>
        </div>
        <div class="row ">
            <?php

            $sql = "SELECT * FROM services where active='1'";
            $result=mysqli_query($connection,$sql);
            $i=1;
            while($table_record=mysqli_fetch_array($result)) {
                $title = $table_record['title'];
                $pic1 = $table_record['pic'];
                $specification = $table_record['specification'];
                $path = "images/services/";
                $iparr = split("⇒",$specification);
                ?>
                <div class="col-lg-3 col-md-3 col-sm-3" style="margin-bottom: 20px">
                    <div class="box" style="width: 250px;height:400px;background: #f5f5f5 ">
                        <div class="boxInner" style="width: 250px;background: #f5f5f5;">
                            <img src='<?php echo $path . $pic1 ?>'/>
                        </div>
                        <div style="margin-left: 6px;margin-top: 10px;word-wrap: break-word;   overflow-wrap: break-word;     /* Renamed property in CSS3 draft spec */
    width: 90%; height: 100% ">
                            <h5 style="color: lightseagreen"><?php echo $title ?></h5>
                            <?php foreach ($iparr as $index=> $id) {
                                if($index>0)
                                    $id="⇒".$id;

                                {?>
                                    <strong style="color: purple"><?php echo $id ?></strong>
                                    <br>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                if($i%4==0){
                    ?>
                <?php
                }
                $i++;
            }
            ?>
        </div>
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
<style>
    .box {
        float: left;
        position: relative;
        width: 14.285714286%;



    }
    .boxInner  {
    }
    .boxInner img {
        width: 100%;
        height: 200px;
        -webkit-filter: grayscale(00%);
        -moz-filter: grayscale(00%);
        -o-filter: grayscale(00%);
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        -ms-transition: all 1s ease;
        transition: all 1s ease;

    }

    .boxInner img:hover {

        -webkit-transform: scale(1.4);
        -moz-transform: scale(1.4);
        -ms-transform: scale(1.4);
        -o-transform: scale(1.4);
        transform: scale(1.4);

    }
</style>
</body>
</html>