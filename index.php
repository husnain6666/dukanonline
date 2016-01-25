<!DOCTYPE html>

<?php include "top_header.php";
include "connectdb.php";?>
<!-- end: Top Heading Bar -->

<div class="f-space20"></div>
<!-- Logo and Search -->
<?php include "main_header.php";?>
<!-- end: Logo and Search -->
<div class="f-space20"></div>
<!-- Menu -->
<div class="container">

    <div class="row clearfix">
        <?php include "main_bar.php";
        $new_sql = "SELECT SUBSTRING(articleName,1,12) as articleName, articleId FROM article order by articleId desc limit 5";
        $new_result = mysqli_query($connection,$new_sql);
        $articleCollection;
        $articleIdCollection;
        $arrayIndex = 0;
        while($new_table_record=mysqli_fetch_array($new_result)) {
            $articleCollection[$arrayIndex] = $new_table_record['articleName'];
            $articleIdCollection[$arrayIndex] = $new_table_record['articleId'];
            $arrayIndex++;
        }
        ?>

        <!-- Top Searches for tablets and large screens -->
        <div class="top-searchs hidden-xs"><span class="title">Top
          Searches</span> <span class="links"> <a href="product.php?articleId=<?php echo $articleIdCollection[0];?>"><?php echo $articleCollection[0];?> |</a> <a href="product.php?articleId=<?php echo $articleIdCollection[1];?>"><?php echo $articleCollection[1];?> |</a> <a href="product.php?articleId=<?php echo $articleIdCollection[2];?>"><?php echo $articleCollection[2];?> |</a> <a href="product.php?articleId=<?php echo $articleIdCollection[3];?>"><?php echo $articleCollection[3];?> |</a> <a href="product.php?articleId=<?php echo $articleIdCollection[4];?>"><?php echo $articleCollection[4];?></a> |</span> </div>
        <!-- end: Top Searches -->

        <!-- Quick Help for tablets and large screens -->
        <div class="quick-message hidden-xs">
            <div class="quick-box">
                <div class="quick-slide"><span class="title">Help</span>
                    <div class="quickbox slide" id="quickbox">
                        <div class="carousel-inner">
                            <div class="item active"> <a href="#a"> <i class="fa fa-envelope fa-fw"></i> Quick Message</a> </div>
                            <div class="item"> <a href="#a"> <i class="fa fa-question-circle fa-fw"></i> FAQ</a> </div>
                            <div class="item"> <a href="#a"> <i class="fa fa-phone fa-fw"></i> (92)3009712255</a> </div>
                        </div>
                    </div>
                    <a class="left carousel-control" data-slide="prev" href="#quickbox"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="right carousel-control" data-slide="next" href="#quickbox"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
            </div>
        </div>
        <!-- end: Quick Help -->

        <div class="clearfix"></div>
        <!-- Iview Slider -->
        <div class="slider">
            <div id="iview">
                <!-- Slide 1 -->
                <div data-iview:image="images/slider1.jpg" data-iview:pausetime="60000">
                    <div class="iview-caption metro-box1 orange" data-transition="wipeUp" data-x="95" data-y="209"> <a href="aboutUs.php">
                            <div class="box-hover"></div>
                            <i class="fa fa-comment-o fa-fw"></i> <span>About us</span></a> </div>
                    <div class="iview-caption metro-box1 blue" data-transition="wipeUp" data-x="266" data-y="209"> <a href="#a">
                            <div class="box-hover"></div>
                            <i class="fa fa-bullhorn fa-fw"></i> <span>Blog</span></a> </div>
                    <div class="iview-caption metro-box2" data-transition="expandLeft" data-x="438" data-y="209">
                        <div class="monthlydeals">
                            <div class="monthly-deals slide" id="monthly-deals">
                                <div class="carousel-inner">
                                    <div class="item active"> <a href="#a"> <img alt="" src="images/slider-deal1.jpg"> </a> </div>
                                    <div class="item"> <a href="#a"> <img alt="" src="images/slider-deal2.jpg"> </a> </div>
                                    <div class="item"> <a href="#a"> <img alt="" src="images/slider-deal4.jpg"> </a> </div>
                                </div>
                            </div>
                            <a class="left carousel-control" data-slide="prev" href="#monthly-deals"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="right carousel-control" data-slide="next" href="#monthly-deals"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                        <!--  <span>Deals of the month</span> -->
                    </div>
                </div>
                <!-- Slide 1 -->
                <div data-iview:image="images/slider1.jpg">
                    <div class="iview-caption caption1" data-transition="wipeUp" data-x="100" data-y="10"></div>
                    <div class="iview-caption caption2" data-easing="easeInOutElastic" data-transition="wipeLeft" data-x="100" data-y="140"></div>
                    <div class="iview-caption caption3" data-easing="easeInOutElastic" data-transition="wipeLeft" data-x="100" data-y="200"></div>
                </div>
                <div data-iview:image="images/slider2.jpg">
                    <div class="iview-caption caption1" data-transition="wipeUp" data-x="100" data-y="10"></div>
                    <div class="iview-caption caption2" data-easing="easeInOutElastic" data-transition="wipeLeft" data-x="100" data-y="140"></div>
                    <div class="iview-caption caption3" data-easing="easeInOutElastic" data-transition="wipeLeft" data-x="100" data-y="200"></div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!--Slider-->
</header>
<!-- end: Header -->
<!-- Products -->
<div class="row clearfix f-space30"></div>
<!--Weekly Hot Deals-->
<!--End Sale-->
<!--Recent Products-->
<div class="container">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span>Weekly Hot Deals</span> <a class="fa fa-plus fa-lg" href="category-grid.php?w=1" data-toggle="tooltip" data-original-title='View More' id="view"></a></div>
            <div class="box-content">
                <div class="box-products slide" id="productc1">
                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc1"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc1"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    <div class="carousel-inner">
                        <!-- Items Row -->
                        <div class="item active">
                            <div class="row box-product">
                                <?php
                                $sql = "SELECT articleId,price,articleName,picture1,discount, pictureTag FROM article limit 36";
                                $result = mysqli_query($connection, $sql);
                                $slideCount = 0;
                                while (($table_record = mysqli_fetch_array($result))) {
                                $articleName = $table_record['articleName'];
                                $articleId = $table_record['articleId'];
                                $price = $table_record['price'];
                                $picture1 = $table_record['picture1'];
                                $discount = $table_record['discount'];
                                $picTag = $table_record['pictureTag'];
                                $discountedPrice = ($price * $discount) / 100;
                                $discountedPrice = $price - $discountedPrice;

                                $query3 = "select (select count(rating) from ratings where articleId = '$articleId') as totalRating, SUM(rating) as sumRating from ratings where articleId = '$articleId'";

                                $result3 = mysqli_query($connection, $query3);
                                $slideCount++;
                                $table_record3 = mysqli_fetch_array($result3);
                                $totalRatings = $table_record3['totalRating'];
                                $ratingSum = $table_record3['sumRating'];
                                if ($totalRatings != 0 || $ratingSum != 0) {
                                    $avgRating = $ratingSum / $totalRatings;
                                } else {
                                    $avgRating = 5;
                                }
                                if ($slideCount == 13 || $slideCount == 25) {

                                ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <?php } ?>
                                <!-- Product -->
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="product-block">
                                        <div class="image">

                                            <div class="product-label product-sale">
                                                <span><?php echo $slideCount;?></span></div>

                                            <a class="img"
                                               href="product.php?articleId=<?php echo $articleId; ?>"><img
                                                    alt="product info"
                                                    src="images/products/<?php echo $picture1; ?>"
                                                    title="product title"></a></div>
                                        <div class="product-meta">
                                            <div class="name">
                                                <a href="product.php?articleId=<?php echo $articleId; ?>"><?php echo $articleName; ?></a>
                                            </div>
                                            <div class="big-price"><span class="price-new"><span
                                                        class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                <span class="price-old"><span class="sym">Rs.</span><?php echo $price;?></span></div>
                                            <div class="small-price"><span class="price-new">Rs.<?php echo $discountedPrice;?></span></div>


                                            <?php /*
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
                                                    } */ ?>
                                            <!--</div>-->

                                        </div>
                                        <div class="meta-back"></div>
                                    </div>
                                </div>
                                <?php if($slideCount == 4 || $slideCount == 8 || $slideCount == 16 || $slideCount == 20 || $slideCount == 28 || $slideCount == 32)
                                { ?>
                                    &nbsp;
                                    <br/>
                                    <hr/>
                                    <br/>
                                <?php } ?>
                                <?php }

                                ?>
                                <!-- end: Product -->
                                <!-- end: Items Row -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!--End Recent Products-->
<!-- Rectangle Banners -->
<?php include "banners.php";?>
<!-- end: Rectangle Banners -->
<!-- Widgets -->
<div class="row clearfix f-space30"></div>
<!--Adds-->
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <!-- end: Get Updates Box -->
        <!-- end: Sidebar -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 blog-block">
                    <!-- Blog widget Box -->
                    <div class="box-content slide carousel-fade" id="blogslide">
                        <div class="carousel-inner">
                            <?php
                            $itemCount = 0;
                            $sql = "SELECT title,description,Date_FORMAT(date, '%d') as day,Date_FORMAT(date, '%b') as month,Date_FORMAT(date, '%Y') as year,picture FROM advertisement WHERE active = 1 ORDER BY date DESC limit 5";
                            $result=mysqli_query($connection,$sql);
                            while($table_record=mysqli_fetch_array($result)) {
                                $title = $table_record['title'];
                                $desc = $table_record['description'];
                                $day = $table_record['day'];
                                $month = $table_record['month'];
                                $year = $table_record['year'];
                                $picture = $table_record['picture'];
                                $itemCount++;
                                ?>
                                <!-- Post -->
                                <div class="blog-entry item <?php
                                if($itemCount == 1)
                                {
                                    echo "active";
                                }
                                ?>">
                                    <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                  Latest Offers</span> <img height="317px" class="ani-image" src="<?php echo $picture;?>" alt="image info"> </div>
                                    <div class="entry-row">
                                        <div class="date col-xs-12"><span><?php echo $day;?></span><span><?php echo $month." ".$year;?></span></div>
                                        <div class="blog-text"> <span><?php echo $title;?></span> <span><?php echo $desc;?>...</span> <span> <a href="#a"> </a> </span> </div>
                                    </div>
                                </div>
                            <?php }// end of while loop?>
                            <!--END Post -->
                        </div>
                        <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#blogslide"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#blogslide"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    </div>
                    <!-- end: Blog widget Box -->
                    <div class="f-space10"></div>
                </div>
                <!-- Best Sellers Products -->
                <div class="col-md-4 box-block sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
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
                                <div class="f-space10"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Brands -->
                        <div class="col-md-12 main-column box-block brands-block">
                            <div class="box-heading"><span>Certificates</span></div>
                            <div class="box-content">
                                <div class="box-products box-brands slide" id="dealership">
                                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#dealership"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#dealership"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                                    <div class="carousel-inner">
                                        <?php
                                        $dealerCount = 0;
                                        $dealerSql = "SELECT * from dealership limit 8";
                                        $dealerResult=mysqli_query($connection,$dealerSql);
                                        while($table_record=mysqli_fetch_array($dealerResult)) {
                                            $dealerPic = $table_record['picture'];
                                            $dealerCount++;
                                            ?>
                                            <div class="brands-row item <?php
                                            if($dealerCount == 1)
                                                echo "active";
                                            ?>">
                                                <div class=""><a href="#a"><img src="<?php echo $dealerPic; ?>" height="213px" alt=""></a></div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- end: Brands -->
    </div>


    <div class="row">
        <!-- Brands -->
        <div class="col-md-12 main-column box-block brands-block">
            <div class="box-heading"><span>Our Clients</span></div>
            <div class="box-content">
                <div class="box-products box-brands slide" id="brands">
                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#brands"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#brands"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    <div class="carousel-inner">
                        <?php
                        $clientCount = 0;
                        $clientSql = "SELECT * from clients limit 8";
                        $clientResult=mysqli_query($connection,$clientSql);
                        while($table_record=mysqli_fetch_array($clientResult)) {
                            $clientPic = $table_record['picture'];
                            $clientCount++;
                            if ($clientCount < 5) {
                                if ($clientCount == 1) {
                                    ?>
                                    <div class="brands-row item active">
                                <?php } ?>
                                <div class="brand-logo"><a href="#a"><img height="130px" src="<?php echo $clientPic; ?>"
                                                                          alt=""></a></div>
                                <?php if ($clientCount == 4) {
                                    ?>
                                    </div>
                                <?php }
                            } else {
                                if ($clientCount == 5) {
                                    ?>
                                    <div class="brands-row item">
                                <?php } ?>
                                <div class="brand-logo"><a href="#a"><img height="130px" src="<?php echo $clientPic; ?>"
                                                                          alt=""></a></div>
                                <?php if ($clientCount == 8) {
                                    ?>
                                    </div>
                                <?php }
                            }
                        }
                        if($clientCount < 8){
                        ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <!-- end: Get Updates Box -->
        <!-- end: Sidebar -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 blog-block">
                    <!-- Blog widget Box -->
                    <div class="box-content slide carousel-fade" id="blogslide">
                        <div class="carousel-inner">
                            <?php
                            $itemCount = 0;
                            $sql = "SELECT title,description,Date_FORMAT(date, '%d') as day,Date_FORMAT(date, '%b') as month,Date_FORMAT(date, '%Y') as year,picture FROM advertisement WHERE active = 1 ORDER BY date DESC limit 5";
                            $result=mysqli_query($connection,$sql);
                            while($table_record=mysqli_fetch_array($result)) {
                                $title = $table_record['title'];
                                $desc = $table_record['description'];
                                $day = $table_record['day'];
                                $month = $table_record['month'];
                                $year = $table_record['year'];
                                $picture = $table_record['picture'];
                                $itemCount++;
                                ?>
                                <!-- Post -->
                                <div class="blog-entry item <?php
                                if($itemCount == 1)
                                {
                                    echo "active";
                                }
                                ?>">
                                    <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                  Latest Offers</span> <img height="317px" class="ani-image" src="<?php echo $picture;?>" alt="image info"> </div>
                                    <div class="entry-row">
                                        <div class="date col-xs-12"><span><?php echo $day;?></span><span><?php echo $month." ".$year;?></span></div>
                                        <div class="blog-text"> <span><?php echo $title;?></span> <span><?php echo $desc;?>...</span> <span> <a href="#a"> </a> </span> </div>
                                    </div>
                                </div>
                            <?php }// end of while loop?>
                            <!--END Post -->
                        </div>
                        <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#blogslide"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#blogslide"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    </div>
                    <!-- end: Blog widget Box -->
                    <div class="f-space10"></div>
                </div>
                <!-- Best Sellers Products -->
                <div class="col-md-4 box-block sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
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
                                <div class="f-space10"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Brands -->
                        <div class="col-md-12 main-column box-block brands-block">
                            <div class="box-heading"><span>Certificates</span></div>
                            <div class="box-content">
                                <div class="box-products box-brands slide" id="dealership">
                                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#dealership"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#dealership"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                                    <div class="carousel-inner">
                                        <?php
                                        $dealerCount = 0;
                                        $dealerSql = "SELECT * from dealership limit 8";
                                        $dealerResult=mysqli_query($connection,$dealerSql);
                                        while($table_record=mysqli_fetch_array($dealerResult)) {
                                            $dealerPic = $table_record['picture'];
                                            $dealerCount++;
                                            ?>
                                            <div class="brands-row item <?php
                                            if($dealerCount == 1)
                                                echo "active";
                                            ?>">
                                                <div class=""><a href="#a"><img src="<?php echo $dealerPic; ?>" height="213px" alt=""></a></div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- end: Brands -->
    </div>


    <div class="row">
        <!-- Brands -->
        <div class="col-md-12 main-column box-block brands-block">
            <div class="box-heading"><span>Our Clients</span></div>
            <div class="box-content">
                <div class="box-products box-brands slide" id="brands">
                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#brands"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#brands"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    <div class="carousel-inner">
                        <?php
                        $clientCount = 0;
                        $clientSql = "SELECT * from clients limit 8";
                        $clientResult=mysqli_query($connection,$clientSql);
                        while($table_record=mysqli_fetch_array($clientResult)) {
                            $clientPic = $table_record['picture'];
                            $clientCount++;
                            if ($clientCount < 5) {
                                if ($clientCount == 1) {
                                    ?>
                                    <div class="brands-row item active">
                                <?php } ?>
                                <div class="brand-logo"><a href="#a"><img height="130px" src="<?php echo $clientPic; ?>"
                                                                          alt=""></a></div>
                                <?php if ($clientCount == 4) {
                                    ?>
                                    </div>
                                <?php }
                            } else {
                                if ($clientCount == 5) {
                                    ?>
                                    <div class="brands-row item">
                                <?php } ?>
                                <div class="brand-logo"><a href="#a"><img height="130px" src="<?php echo $clientPic; ?>"
                                                                          alt=""></a></div>
                                <?php if ($clientCount == 8) {
                                    ?>
                                    </div>
                                <?php }
                            }
                        }
                        if($clientCount < 8){
                        ?>
                    </div>
                    <?php }
                    echo $url;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: Widgets -->
<div class="row clearfix f-space30"></div>

<!-- footer -->
<?php include "footer.php";?>
<!-- end: footer -->

<!-- Style Switcher JS -->
<script src="js/style-switch.js" type="text/javascript"></script>
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
        $('#productc3').carousel({
            interval: 6000
        });
        $('#brands').carousel({
            interval: 4000
        });
        $('#productc2').carousel({
            interval: 5000
        });
        $('#blogslide').carousel({
            interval: 4000
        });
        $('#productc1').carousel({
            interval: 4000
        });
        $('#dealership').carousel({
            interval: 2000
        });
        $('#productc5').carousel({
            interval: 4000
        });
    })(jQuery);

    $("view").click(function(){
        $("panel").show(1000);
    });


</script>
</body>
</html>