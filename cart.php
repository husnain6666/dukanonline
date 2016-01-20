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


if ($quantity==0)
    $quantity=1;
}

if(isset($_GET['color'])){
    $color=$_GET['color'];


}


if(isset($_GET['size'])){
    $size=$_GET['size'];

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


$sql="select orderdetails.trackingNo, status, orderdetails.userId from ordertracking inner join orderdetails on orderdetails.trackingNo=ordertracking.trackingNo  and status='In Progress' and userId='$userId'";
$result=mysqli_query($connection,$sql);
if(($result->num_rows)>0){
    $table_record=mysqli_fetch_array($result);
    $trackingNo=$table_record['trackingNo'];
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

        }

    }



}

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
    error_reporting(E_ERROR | E_PARSE);
    while($table_record=mysqli_fetch_array($result)){

        if($articleId==$table_record['articleId']){
            $check=true;
            $query="update orderdetails set quantity='$quantity',totalPrice='$totalPrice',color='$color',size='$size' where trackingNo='$trackingNo' and userId='$userId' and articleId='$articleId'";
            $result=mysqli_query($connection,$query);
        }
    }


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
            } else {
                          echo "Error: " . $sql . "<br>" . $connection->error;
            }

        }
        $sql ="INSERT INTO orderdetails (articleId, userId, quantity, totalPrice,color,size,trackingNo) VALUES ( '$articleId', '$userId', '$quantity', '$totalPrice','$color','$size','$trackingNo')";
        if ($connection->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }





    }



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


$sql = "SELECT orderdetails.articleId,orderdetails.quantity,orderdetails.totalPrice,orderdetails.color,orderdetails.size,price,articleName,trackingNo,article.picture1,article.discount,article.Category FROM orderdetails inner join article on orderdetails.articleId=article.articleId and userId='$userId' and orderdetails.trackingNo='$trackingNo'";
$result=mysqli_query($connection,$sql);

while($table_record=mysqli_fetch_array($result)){
$articleName = $table_record['articleName'];
$price = $table_record['price'];
$articleNo=$table_record['articleId'];
$totalPrice=$table_record['totalPrice'];
$quantity=$table_record['quantity'];
$picture1=$table_record['picture1'];
$discount=$table_record['discount'];
$color=$table_record['color'];
$size=$table_record['size'];
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
                   <?php if($color!==""){   ?>  <div class="att"> <span>Color:</span> <a href="#a" data-toggle="tooltip" title="" class="color bg-<?php echo $color ?>" data-original-title="<?php echo $color ?>"></a> </div>
                   <div class="att"> <span>Size:</span> <span class="size"><?php echo $size ?></span> </div>
                   <?php  }  ?>         <div class="att"> <span>Category:</span> <span class="size"><?php echo $category; ?></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 hidden-sm hidden-xs p-wr">
                <div class="product-attrb-wr">
                    <div class="product-attrb">
                        <div class="qtyinput">
                            <div class="quantity-inp">
                                <div class="numeric-input">

                                    <input type="number" min="1" max=""  value="<?php echo $quantity; ?>"  class="form-control" id="q" onchange="changequantity(this.value,<?php echo $userId ?>,<?php echo $articleNo ?>,<?php echo $trackingNo ?>,<?php echo $totalPrice; ?>)">

                                </div>
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
                        <div class="remove"  onclick="removeitem(<?php echo $userId ?>,<?php echo $articleNo ?>,<?php echo $trackingNo ?>)"> <a href="#a" class="color2" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o fa-fw color2"></i></a> </div>
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