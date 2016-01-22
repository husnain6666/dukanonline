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
                <h2>Order Information</h2>
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

            <!-- Checkout Options -->
            <div class="box-content checkout-op">
                <div class="panel-group" id="checkout-options">

                    <!-- login and register panel -->


                    <div class="panel panel-default">
                        <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op3" data-toggle="collapse">
                            <h4 class="panel-title"> <a href="#a"> <span class="fa fa-envelope-o"></span> Basic Information </a> </h4>
                        </div>
                        <div class="panel-collapse collapse" id="op3">
                            <div class="panel-body">
                                <div class="row co-row">
                                    <form action="insertincart.php?trackingNo=<?php echo $trackingNo?>& overallprice=<?php echo $overAllprice; ?>" method="post" onsubmit="return validation_billing_shipping();" >
                                        <?php
                                        //  $trackingNo=$_SESSION['trackingNo'];
                                        $trackingNo=$_SESSION['trackingNo'];
                                        $userId=$_SESSION['loginId'];

                                        //echo $trackingNo;
                                        $sql="select ordertracking.date as dateOrder, paymentMethod,totalAmount,shippmentMethod from ordertracking where trackingNo= '$trackingNo'";
                                        $result=mysqli_query($connection,$sql);
                                        $table_record=mysqli_fetch_array($result);
                                        $date = $table_record['dateOrder'];
                                        $paymentMethod = $table_record['paymentMethod'];
                                        $shippingMethod = $table_record['shippmentMethod'];
                                        $totalAmount=$table_record['totalAmount'];
                                        ?>

                                        <table style="margin-left: 10px"  cellspacing="10" cellpadding="5" data-width="1000px" class="orderinfo-table">



                                            <tr width="100px">
                                                <td width="300px"><strong>Order number</strong></td>
                                                <td width="200px" style="color: blue; font-weight: bold"><?php echo $trackingNo; ?></td>
                                            </tr>

                                            <tr>
                                                <td><strong> Date</strong></td>
                                                <td><?php echo $date; ?></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Order status</strong></td>
                                                <td  style="color: blue; font-weight: bold">Confirmed</td>
                                            </tr>



                                            <tr>
                                                <td><strong>Shipment</strong></td>
                                                <td><?php if($shippingMethod==="freeshipping") echo "Free Shipping";
                                                    else
                                                        echo "Per Item Shipping";
                                                    ?></td>
                                            </tr>



                                            <tr>
                                                <td><strong>Payment</strong></td>
                                                <td><?php if($paymentMethod==="COD") echo "Cash On Delivery";
                                                    else
                                                        echo "Bank Transfer";
                                                    ?></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Total</strong></td>
                                                <td style="color: blue; font-weight: bold"><span class="price">Rs.<?php echo $totalAmount; ?></span></td>
                                            </tr>

                                        </table>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="box-content form-box">


                                            </div>
                                        </div>
                                        <!-- end: Register -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Login -->




                    <div class="panel panel-default"> <!-- add class disabled to prevent from clicking -->
                        <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op4" data-toggle="collapse">
                            <h4 class="panel-title"> <a href="#a"> <span class="fa fa-truck"></span> SHIPPING Information </a></h4>
                        </div>
                        <div class="panel-collapse collapse" id="op4">
                            <div class="panel-body">
                                <div class="row co-row">

                                    <!-- Shipping methods -->


                                    <?php


                                    $sql = "SELECT  shippingadress.name, address,  city, country, phoneNo from shippingadress where trackingNo='$trackingNo'";
                                    $result=mysqli_query($connection,$sql);

                                    $table_record=mysqli_fetch_array($result);
                                    $name = $table_record['name'];
                                    $address=$table_record['address'];

                                    $city=$table_record['city'];
                                    $country=$table_record['country'];
                                    $phoneNo=$table_record['phoneNo'];
                                    ?>

                                    <table style="margin-left: 10px"  cellspacing="10" cellpadding="5" data-width="1000px" class="orderinfo-table">


                                        <tr>
                                            <td width="300px"><strong>Clien Name</strong></td>
                                            <td width="300px" style="color: red; font-weight: bold"><?php echo $name; ?></td>
                                        </tr>


                                        <tr>
                                            <td><strong>Address </strong></td>
                                            <td width="200px" style="color: red; font-weight: bold"><?php echo $address; ?></td>
                                        </tr>



                                        <tr>
                                            <td><strong>City</strong></td>
                                            <td><?php echo $city; ?></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Country</strong></td>
                                            <td><?php echo $country; ?></td>
                                        </tr>

                                        <tr>
                                            <td width="300px"><strong>Phone</strong></td>
                                            <td width="200px" style="color: red; font-weight: bold"><?php echo $phoneNo ?></td>
                                        </tr>


                                    </table>


                                </div>
                                <!-- end: Shipping methods -->

                            </div>
                        </div>
                    </div>




                    <div class="panel panel-default"> <!-- add class disabled to prevent from clicking -->
                        <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op5" data-toggle="collapse">
                            <h4 class="panel-title"> <a href="#a"> <span class="fa fa-money"></span>INVOICE</h4>
                        </div>
                        <div class="panel-collapse collapse" id="op5">
                            <div class="panel-body">
                                <div class="row co-row">

                                    <!-- Payment methods -->





                                    <?php

                                    $overallPrice=0;
                                    $sql = "SELECT orderdetails.articleId,orderdetails.quantity,orderdetails.totalPrice,price,articleName,trackingNo,article.picture1,article.discount,article.Category FROM orderdetails inner join article on orderdetails.articleId=article.articleId and userId='$userId' and orderdetails.trackingNo='$trackingNo'";
                                    $result=mysqli_query($connection,$sql);

                                    while($table_record=mysqli_fetch_array($result)){
                                        $articleName = $table_record['articleName'];
                                        $price = $table_record['price'];
                                        $articleNo=$table_record['articleId'];
                                        $totalPrice=$table_record['totalPrice'];
                                        $quantity=$table_record['quantity'];
                                        $picture1=$table_record['picture1'];
                                        $discount=$table_record['discount'];
                                        $discountedPrice = ($price * $discount)/100;
                                        $discountedPrice = $price - $discountedPrice;
                                        $category=$table_record['Category'];
                                        $overallPrice+=$totalPrice;

                                        ?>




                                        <div  class="col-md-12 product">

                                            <div class="col-md-3 col-sm-3 hidden-xs p-wr">
                                                <div class="product-attrb-wr">
                                                    <div class="product-attrb">
                                                        <div class="image"> <a class="img" href="product.php?articleId=<?php echo $articleId; ?>" ><img alt="product info" src="images/products/<?php echo $picture1?>" title="product title"></a> </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
                                                <div class="product-attrb-wr">
                                                    <div class="product-meta">
                                                        <div class="name">
                                                            <h3><a href="product.php?articleId=<?php echo $articleId; ?>" ><?php echo $articleName; ?></a></h3>
                                                        </div>
                                                        <div class="price"> <span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice; ?></span><?php if($discountedPrice < $price){ ?> <span class="price-old"><span class="sym">Rs.</span><?php echo $price; ?></span> <?php } ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 hidden-sm hidden-xs p-wr">
                                                <div class="product-attrb-wr">
                                                    <div class="product-attrb">
                                                        <div class="att"> <span>Color:</span> <a href="#a" data-toggle="tooltip" title="" class="color bg-teal" data-original-title="Teal"></a> </div>
                                                        <div class="att"> <span>Size:</span> <span class="size">XS</span> </div>
                                                        <div class="att"> <span>Category:</span> <span class="size"><?php echo $category; ?></span> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 hidden-sm hidden-xs p-wr">
                                                <div class="product-attrb-wr">
                                                    <div class="product-attrb">
                                                        <div class="qtyinput">
                                                            <div class="quantity-inp">
                                                                <input disabled type="text" class="quantity-input" name="p_quantity" id="quantity" value="<?php echo $quantity; ?>">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 hidden-sm hidden-xs p-wr">
                                                <div class="product-attrb-wr">
                                                    <div class="product-attrb">
                                                        <div class="price"> <span class="t-price"><span class="sym">Rs.</span><?php echo $totalPrice ?></span> </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <!-- end: product -->
                                    <?php } ?>



                                    <div class="col-md-12 col-sm-12 col-xs-12 cart-box-wr">
                                        <div class="box-content">
                                            <div class="cart-box-tm">
                                                <div class="tm1">Sub-Total</div>
                                                <div class="tm2">Rs.<?php echo $overallPrice; ?></div>
                                            </div>
                                            <div class="clearfix f-space10"></div>
                                            <div class="cart-box-tm">
                                                <div class="tm1">Tax (Rs.0) </div>
                                                <div class="tm2"></div>
                                            </div>
                                            <div class="clearfix f-space10"></div>
                                            <div class="cart-box-tm">
                                                <div class="tm1">Free Shipping </div>
                                                <div class="tm2">Rs.0</div>
                                            </div>
                                            <div class="clearfix f-space10"></div>
                                            <div class="cart-box-tm">
                                                <div class="tm3 bgcolor2">Total </div>
                                                <div class="tm4 bgcolor2">Rs.<?php echo $overallPrice;?></div>
                                            </div>
                                            <div class="clearfix f-space10"></div>


                                        </div>
                                    </div>



                                    <!-- end: Payment methods -->

                                </div>
                            </div>
                        </div>
                    </div>


                </div>





            </div>
        </div>








        <div class="col-md-3 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span>Summary</span></div>
            <!-- Cart Summary -->
            <div class="box-content cart-box-wr">
                <div class="cart-box-tm">
                    <div class="tm1">Sub-Total</div>
                    <div class="tm2">Rs.<?php echo $overAllprice; ?></div>
                </div>
                <div class="cart-box-tm">
                    <div class="tm1">Tax (Rs.0) </div>
                    <div class="tm2"></div>
                </div>

                <div class="cart-box-tm">
                    <div class="tm3 bgcolor2">Total </div>
                    <div class="tm4 bgcolor2">Rs.<?php echo $overAllprice;?></div>
                </div>
            </div>

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