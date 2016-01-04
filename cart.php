<!DOCTYPE html>
<?php include "top_header.php";?>
<!-- end: Top Heading Bar -->

<div class="f-space20"></div>
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
            <div class="breadcrumb"> <a href="index.php"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="product.php"> Product </a> </div>

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







<?php

$articleId = $_GET['articleId'];

//$quantity=$_POST['quantity'];
if(isset($_GET['quantity'])){
$quantity=$_GET['quantity'];

echo $quantity;

if ($quantity==0)
    $quantity=1;
echo $quantity;
}
$userName=$_SESSION['loginUser'];
$userId = $_SESSION['loginId'];

$checkTracking1=true;
$checkTracking=true;
$sql = "SELECT userId FROM userinfo WHERE emailAddress = '$userName'";
$result=mysqli_query($connection,$sql);
$table_record=mysqli_fetch_array($result);
$userId=$table_record['userId'];



$datetimeToday=date("Y-m-d H:i:s");

/*
$sql="select quantity from userinfo where userId='$userId'";
$result=mysqli_query($connection,$sql);
$table_record=mysqli_fetch_array($result);
$quantity=$table_record['quantity'];
//echo $quantity;
*/


$sql="select orderdetails.trackingNo, status, orderdetails.userId from ordertracking inner join orderdetails on orderdetails.trackingNo=ordertracking.trackingNo  and status='In Progress' and userId='$userId'";
$result=mysqli_query($connection,$sql);
//if(($result->num_rows)>0){
if(($result->num_rows)>0){
    $table_record=mysqli_fetch_array($result);
    $trackingNo=$table_record['trackingNo'];
      echo 'ok';
}
else if(($result->num_rows)==0){
    $sql = "SELECT userId FROM userinfo WHERE emailAddress = '$userName'";
    $result=mysqli_query($connection,$sql);
    $table_record=mysqli_fetch_array($result);
    $userId=$table_record['userId'];
    $trackingNo=date("Ymd").$articleId.$userId;

    $sql1 = "SELECT trackingNo FROM ordertracking WHERE status = 'Confirmed'";
    $result1=mysqli_query($connection,$sql1);
    while($table_record1=mysqli_fetch_array($result1)){
        $trackingCheck=$table_record1['trackingNo'];
        $randomNumber=rand(1,1000);
        if($trackingNo===$trackingCheck){

            $trackingNo=$trackingNo.$randomNumber;

                echo $trackingNo;
            //    echo "yeah";
        }

    }

    echo $trackingNo;
    //  echo "yeah";


}
//else
//  echo 'pato';
if($articleId!=-9999){
    $sql = "SELECT price,discount FROM article where articleId='$articleId'";
    $result=mysqli_query($connection,$sql);
    $table_record=mysqli_fetch_array($result);
    $price = $table_record['price'];

    $discount = $table_record['discount'];
    $discountedPrice = ($price * $discount)/100;
    $discountedPrice = $price - $discountedPrice;

    $totalPrice=$discountedPrice*$quantity;

    $sql = "SELECT orderdetails.articleId FROM orderdetails inner join userinfo on orderdetails.userId=userinfo.userId and userinfo.emailAddress = '$userName' and orderdetails.trackingNo = '$trackingNo'";
    $result=mysqli_query($connection,$sql);
    $check=false;
    echo "Google";
    error_reporting(E_ERROR | E_PARSE);
    while($table_record=mysqli_fetch_array($result)){

        if($articleId==$table_record['articleId']){
            $check=true;
            $query="update orderdetails set quantity='$quantity',totalPrice='$totalPrice' where trackingNo='$trackingNo' and userId='$userId' and articleId='$articleId'";
            $result=mysqli_query($connection,$query);
        }
    }

     echo $articleId;

    echo $quantity;
    $trackingNotemp=null;
    $overAllprice=0;
    if($check==false){



        $sql="select ordertracking.trackingNo,status from  ordertracking inner join orderdetails on ordertracking.trackingNo=orderdetails.trackingNo and userId='$userId' and ordertracking.status='In Progress'";
        $result=mysqli_query($connection,$sql);
        $table_record=mysqli_fetch_array($result);
        $status=$table_record['status'];
        $trackingNotemp=$table_record['trackingNo'];
        if($status=='In Progress'){
            $checkTracking=true;
            $trackingNo= $trackingNotemp;
        }

        else
            $checkTracking=false;



        if($checkTracking==false){
            $sql ="INSERT INTO ordertracking (date,status,trackingNo) VALUES ( '$dateToday', 'In progress', '$trackingNo')";
            if ($connection->query($sql) === TRUE) {
                           echo "New record created successfullyhehehehe";
            } else {
                          echo "Error: " . $sql . "<br>" . $connection->error;
            }

        }
        echo $quantity;
        $sql ="INSERT INTO orderdetails (articleId, userId, quantity, totalPrice, trackingNo) VALUES ( '$articleId', '$userId', '$quantity', '$totalPrice', '$trackingNo')";
        if ($connection->query($sql) === TRUE) {
              echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }





    }
       else
        echo 'order already placed';


}
else
{
    $overAllprice=0;



}

$sql="select count(articleId) as quantityCart from orderdetails inner join ordertracking on orderdetails.trackingNo=ordertracking.trackingNo and ordertracking.status='In Progress' and userId='$userId'";
$result=mysqli_query($connection,$sql);
$table_record=mysqli_fetch_array($result);
$quantityCart=$table_record['quantityCart'];

?>





<div class="row clearfix f-space10"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <h2>Cart (<?php echo $quantityCart;?> Items)</h2>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix f-space10"></div>
<!-- product -->

<?php


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
$overAllprice += $totalPrice;

?>


<div class="container">
    <div class="row">
        <div class="product">
            <div class="col-md-2 col-sm-3 hidden-xs p-wr">
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
                        <a href="product.php?articleId=<?php echo $articleId; ?>" class="btn normal color2">Edit Order</a> </div>
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
                                <input type="text" class="quantity-input" name="p_quantity" id="quantity" value="<?php echo $quantity; ?>">
                                <div class="quantity-txt minusbtn"><a href="#a" class="qty qtyminus" ><i class="fa fa-minus fa-fw"></i></a></div>
                                <div class="quantity-txt plusbtn"><a href="#a" class="qty qtyplus" ><i class="fa fa-plus fa-fw"></i></a></div>
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
            <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
                <div class="product-attrb-wr">
                    <div class="product-attrb">
                        <div class="remove"> <a href="#a" class="color2" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o fa-fw color2"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: product -->
<?php } ?>


<!--

<!-- end: product -->
<div class="row clearfix f-space30"></div>
<div class="container">
    <div class="row">
        <!--
        <div class="col-md-4  col-sm-4 col-xs-12 cart-box-wr">
            <div class="box-heading"><span>Estimate Shipping & Taxes</span></div>
            <div class="clearfix f-space10"></div>
            <div class="box-content cart-box">
                <p>Enter your destination to get a shipping estimate.</p>
                <form>
                    <input type="text" value="" placeholder="Country" class="input4" />
                    <input type="text" value="" placeholder="Region/State" class="input4" />
                    <button class="btn large color2 pull-right">Submit</button>
                </form>
            </div>
            <div class="clearfix f-space30"></div>
        </div>


        <div class="col-md-4  col-sm-4 col-xs-12 cart-box-wr">
            <div class="box-heading"><span>Discount Codes</span></div>
            <div class="clearfix f-space10"></div>
            <div class="box-content cart-box">
                <p>Enter your coupon code if you have one.</p>
                <form>
                    <input type="text" value="" placeholder="Country" class="input4" />
                    <input type="text" value="" placeholder="Region/State" class="input4" />
                    <button class="btn large color2 pull-right">Submit</button>
                </form>
            </div>
            <div class="clearfix f-space30"></div>
        </div>

        <!-- end: Discount Codes -->

        <!-- 	Total amount -->

        <div class="col-md-12 col-sm-12 col-xs-12 cart-box-wr">
            <div class="box-content">
                <div class="cart-box-tm">
                    <div class="tm1">Sub-Total</div>
                    <div class="tm2">Rs.<?php echo $overAllprice; ?></div>
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
                    <div class="tm4 bgcolor2">Rs.<?php echo $overAllprice;?></div>
                </div>
                <div class="clearfix f-space10"></div>

                <form action="checkout.php?trackingNo=<?php echo $trackingNo; ?>& total=<?php echo $overAllprice; ?>  " method="post">

                <button  type="submit"  name="submit" class="btn large color1 pull-right">Proceed to Checkout</button>
                <div class="clearfix f-space30"></div>
            </form>
            </div>
        </div>

        <!-- end: Total amount -->

    </div>
</div>

<!-- Rectangle Banners -->

<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner blue">
                <div class="banner"> <i class="fa fa-thumbs-up"></i>
                    <h3>Guarantee</h3>
                    <p>100% Money Back Guarantee*</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner red">
                <div class="banner"> <i class="fa fa-tags"></i>
                    <h3>Affordable</h3>
                    <p>Convenient & affordable prices for you</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner orange">
                <div class="banner"> <i class="fa fa-headphones"></i>
                    <h3>24/7 Support</h3>
                    <p>We support everything we sell</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner lightblue">
                <div class="banner"> <i class="fa fa-female"></i>
                    <h3>Summer Sale</h3>
                    <p>Upto 50% off on all women wear</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner darkblue">
                <div class="banner"> <i class="fa fa-gift"></i>
                    <h3>Surprise Gift</h3>
                    <p>Value $50 on orders over $700</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner black">
                <div class="banner"> <i class="fa fa-truck"></i>
                    <h3>Free Shipping</h3>
                    <p>All over in world over $100</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: Rectangle Banners -->

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
                    <li class="item"> <a href="#">Delivery Info</a></li>
                    <li class="item"> <a href="#">FAQs</a></li>
                    <li class="item"> <a href="#">Payment Instructions</a></li>
                    <li class="item"> <a href="#">Request Product</a></li>
                    <li class="item"> <a href="#">Vendor Registration</a></li>
                    <li class="item"> <a href="#">Affiliates</a></li>
                    <li class="item"> <a href="#">Gift Vouchers</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-12 footermenu">
                <h4 class="title">My account</h4>
                <ul>
                    <li class="item"> <a href="#">My Account</a></li>
                    <li class="item"> <a href="#">Order History</a></li>
                    <li class="item"> <a href="#">Wish List</a></li>
                    <li class="item"> <a href="#">Newsletter</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-12 getintouch">
                <h4 class="title">get in touch</h4>
                <ul>
                    <li>
                        <div class="icon"><i class="fa fa-map-marker fa-fw"></i></div>
                        <div class="c-info"> <span>3rd Avenue, NY, US<br>
              <a href="#">Find us on map</a></span></div>
                    </li>
                    <li>
                        <div class="icon"><i class="fa fa-envelope-o fa-fw"></i></div>
                        <div class="c-info"> <span>Email Us At:<br>
              <a href="#">support@domain.com</a></span></div>
                    </li>
                    <li>
                        <div class="icon"><i class="fa fa-phone fa-fw"></i></div>
                        <div class="c-info"> <span>24/7 Phone Support:<br>
              <a href="#">+1 (888) 888 8888</a></span></div>
                    </li>
                    <li>
                        <div class="icon"> <i class="fa fa-skype fa-fw"></i></div>
                        <div class="c-info"> <span>Talk to Us:<br>
              <a href="#">skypeid</a></span></div>
                    </li>
                </ul>
                <div class="social-icons">
                    <ul>
                        <li class="icon google-plus"><a href="#"><i class="fa fa-google-plus fa-fw"></i></a></li>
                        <li class="icon linkedin"><a href="#"><i class="fa fa-linkedin fa-fw"></i></a></li>
                        <li class="icon twitter"><a href="#"><i class="fa fa-twitter fa-fw"></i></a></li>
                        <li class="icon facebook"><a href="#"><i class="fa fa-facebook fa-fw"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-xs-12"> <span class="copytxt">&copy; Copyright 2013 by <a href="#">Flatro</a> -  All rights reserved</span> <span class="btmlinks"><a href="#">Return Policy</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></span> </div>
                <div class="col-lg-4 col-sm-4 col-xs-12 payment-icons"> <a href="#"> <img src="images/icons/discover.png" alt="discover"> </a> <a href="#"> <img src="images/icons/2co.png" alt="2co"> </a> <a href="#"> <img src="images/icons/paypal.png" alt="paypal"> </a> <a href="#"> <img src="images/icons/mastercard.png" alt="master card"> </a> <a href="#"> <img src="images/icons/visa.png" alt="visa card"> </a> <a href="#"> <img src="images/icons/moneybookers.png" alt="moneybookers"> </a> </div>
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

    })(jQuery);

</script>
</body>
</html>