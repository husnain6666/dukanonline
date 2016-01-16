<!DOCTYPE html>
<?php include "top_header.php";
      include "connectdb.php";
?>
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
        <script src="js/notie.js"></script>
        <script src="js/total.js"></script>


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
        <div data-iview:image="images/slide0.jpg" data-iview:pausetime="60000">
            <div class="iview-caption metro-box1 orange" data-transition="wipeUp" data-x="95" data-y="209"> <a href="about.html">
                    <div class="box-hover"></div>
                    <i class="fa fa-comment-o fa-fw"></i> <span>About us</span></a> </div>
            <div class="iview-caption metro-box1 blue" data-transition="wipeUp" data-x="266" data-y="209"> <a href="#a">
                    <div class="box-hover"></div>
                    <i class="fa fa-bullhorn fa-fw"></i> <span>Blog</span></a> </div>
            <div class="iview-caption metro-box2" data-transition="expandLeft" data-x="438" data-y="209">
                <div class="monthlydeals">
                    <div class="monthly-deals slide" id="monthly-deals">
                        <div class="carousel-inner">
                            <div class="item active"> <a href="#a"> <img alt="" src="images/slider1.jpg"> </a> </div>
                            <div class="item"> <a href="#a"> <img alt="" src="images/slider2.jpg"> </a> </div>
                            <div class="item"> <a href="#a"> <img alt="" src="images/slider3.jpg"> </a> </div>
                            <div class="item"> <a href="#a"> <img alt="" src="images/slider-deal4.jpg"> </a> </div>
                        </div>
                    </div>
                    <a class="left carousel-control" data-slide="prev" href="#monthly-deals"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="right carousel-control" data-slide="next" href="#monthly-deals"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                <!--  <span>Deals of the month</span> -->
            </div>
            <div class="iview-caption metro-box1 purple" data-transition="wipeDown" data-x="438" data-y="37"> <a href="#a">
                    <div class="box-hover"></div>
                    <i class="fa fa-female fa-fw"></i> <span>Women Clothing</span></a> </div>
            <div class="iview-caption metro-box1 dark-blue" data-transition="wipeDown" data-x="610" data-y="37"> <a href="#a">
                    <div class="box-hover"></div>
                    <i class="fa fa-male fa-fw"></i> <span>Men Clothing</span></a> </div>
            <div class="iview-caption metro-heading" data-transition="expandLeft" data-x="95" data-y="40">
                <h1>FLATRO ECOMMERCE HTML5</h1>
            </div>
            <div class="iview-caption metro-heading" data-transition="wipeLeft" data-x="95" data-y="100"> <span>Curabitur aliquet quam id dui posuere blandit. Ante ipsum primis
                in faucibus orci luctus et ultrices posuere cubilia Curae, Donec velit
                neque.<br>
                <a href="#a">read more</a></span> </div>
        </div>
        <!-- Slide 1 -->
        <div data-iview:image="images/slide1.jpg">
            <div class="iview-caption caption1" data-transition="wipeUp" data-x="100" data-y="10">30%</div>
            <div class="iview-caption caption2" data-easing="easeInOutElastic" data-transition="wipeLeft" data-x="100" data-y="140">SPECIAL
                OFFER</div>
            <div class="iview-caption caption3" data-easing="easeInOutElastic" data-transition="wipeLeft" data-x="100" data-y="200">Enthusiastically
                orchestrate performance based<br>
                experiences via granular networks.</div>
            <div class="iview-caption btn-more" data-transition="fade" data-x="100" data-y="280"><a href="#a">Learn
                    more</a></div>
        </div>
        <!-- Slide 2 -->
        <div data-iview:image="images/slide2.jpg">
            <div class="iview-caption caption3 btm-bar" data-height="107px" data-transition="expandRight" data-width="867px" data-x="0" data-y="300">
                <h1><b>Metro style slider</b> bottom caption!</h1>
                <p>Energistically enable enabled vortals for cross-unit niche markets.
                    Professionally leverage existing visionary customer service with virtual
                    collaboration and idea-sharing. Distinctively foster ethical content
                    whereas future-proof applications.</p>
            </div>
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
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span>Weekly Hot Deals</span></div>
            <div class="box-content">
                <div class="box-products slide" id="productc1">
                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc1"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc1"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    <div class="carousel-inner">
                        <!-- Items Row -->
                        <div class="item active">
                            <div class="row box-product">
                                <?php
                                $sql = "SELECT articleId,price,articleName,picture1,discount FROM article where weekDeal='1' limit 15";
                                $result=mysqli_query($connection,$sql);
                                $slideCount = 0;
                                while($table_record=mysqli_fetch_array($result)) {
                                    $articleName = $table_record['articleName'];
                                    $articleId = $table_record['articleId'];
                                    $price = $table_record['price'];
                                    $picture1 = $table_record['picture1'];
                                    $discount = $table_record['discount'];
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
                                    if ($slideCount%4 !== 0 ) {

                                        ?>
                                        <!-- Product -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-block">
                                                <div class="image">
                                                    <div class="product-label product-sale"><span>SALE</span></div>
                                                    <a class="img"
                                                       href="product.php?articleId=<?php echo $articleId;?>"><img
                                                            alt="product info"
                                                            src="images/products/<?php echo $picture1;?>"
                                                            title="product title"></a></div>
                                                <div class="product-meta">
                                                    <div class="name"><a
                                                            href="product.php?articleId=<?php echo $articleId;?>"><?php echo $articleName;?></a>
                                                    </div>
                                                    <?php if($discount > 0) { ?>
                                                        <div class="big-price"><span class="price-new"><span
                                                                    class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price;?></span></div>
                                                    <?php
                                                    } else { ?>
                                                        <div class="big-price"><span class="price-new"><span
                                                                    class="sym">Rs.</span><?php echo $price;?></span>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if ($check !== false) { //check if user is logged in or not?>
                                                        <div class="big-btns"><a
                                                                class="btn btn-default btn-view pull-left"
                                                                href="product.php?articleId=<?php echo $articleId; ?>">View</a>
                                                            <a class="btn btn-default btn-addtocart pull-right"
                                                               onclick="addtocart(<?php echo $articleId; ?>)" href="#">BUY
                                                                NOW!</a></div>
                                                    <?php }// end if
                                                    else {
                                                        ?>
                                                        <div class="big-btns"><a
                                                                class="btn btn-default btn-view pull-left"
                                                                href="product.php?articleId=<?php echo $articleId;?>">View</a>
                                                            <a class="btn btn-default btn-addtocart pull-right"
                                                               href="create_an_account.php">BUY NOW!</a></div>
                                                    <?php }// end else
                                                    ?>
                                                    <div class="small-price"><span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym"></span>&nbsp;</span></div>
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
                                                        }
                                                    ?>
                                                    </div>
                                                    <?php if($check == 1){ ?>
                                                    <div class="small-btns">
                                                        <button class="btn btn-default btn-compare pull-left"
                                                                data-toggle="tooltip" title="Add to Compare"><i
                                                                class="fa fa-retweet fa-fw"></i></button>
                                                        <button class="btn btn-default btn-wishlist pull-left"
                                                                data-toggle="tooltip" title="Add to Wishlist" onclick="addWish(<?php echo $articleId ?>)"><i
                                                                class="fa fa-heart fa-fw"></i></button>
                                                        <button class="btn btn-default btn-addtocart pull-left"
                                                                data-toggle="tooltip" title="Add to Cart"><i
                                                                class="fa fa-shopping-cart fa-fw"></i></button>
                                                    </div>
                                                    <?php  } else { ?>
                                                        <div class="small-btns">
                                                            <button class="btn btn-default btn-compare pull-left"
                                                                    data-toggle="tooltip" title="Add to Compare"><i
                                                                    class="fa fa-retweet fa-fw"></i></button>
                                                            <button class="btn btn-default btn-wishlist pull-left"
                                                                    data-toggle="tooltip" title="Add to Wishlist" onclick="window.location.href='signUp.php';"><i
                                                                    class="fa fa-heart fa-fw"></i></button>
                                                            <button class="btn btn-default btn-addtocart pull-left"
                                                                    data-toggle="tooltip" title="Add to Cart" onclick="window.location.href='signUp.php';"><i
                                                                    class="fa fa-shopping-cart fa-fw"></i></button>
                                                        </div>
                                                    <?php  } ?>
                                                </div>
                                                <div class="meta-back"></div>
                                            </div>
                                        </div>
                                        <!-- end: Product -->
                                    <?php }// end if condition
                                    else
                                    {
                                ?>
                                        </div>
                                    </div>
                        <div class="item">
                            <div class="row box-product">
                                <!-- Product -->
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="product-block">
                                        <div class="image">
                                            <div class="product-label product-sale"><span>SALE12</span></div>
                                            <a class="img"
                                               href="product.php?articleId=<?php echo $articleId;?>"><img
                                                    alt="product info"
                                                    src="images/products/<?php echo $picture1;?>"
                                                    title="product title"></a></div>
                                        <div class="product-meta">
                                            <div class="name"><a
                                                    href="product.php?articleId=<?php echo $articleId;?>"><?php echo $articleName;?></a>
                                            </div>
                                            <?php if($discount > 0) { ?>
                                                <div class="big-price"><span class="price-new"><span
                                                            class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price;?></span></div>
                                            <?php
                                            } else { ?>
                                                <div class="big-price"><span class="price-new"><span
                                                            class="sym">Rs.</span><?php echo $price;?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($check !== false) { //check if user is logged in or not?>
                                                <div class="big-btns"><a
                                                        class="btn btn-default btn-view pull-left"
                                                        href="product.php?articleId=<?php echo $articleId; ?>">View</a>
                                                    <a class="btn btn-default btn-addtocart pull-right"
                                                       onclick="addtocart(<?php echo $articleId;?>)" href="#">BUY
                                                        NOW!</a></div>
                                            <?php }// end if
                                            else {
                                                ?>
                                                <div class="big-btns"><a
                                                        class="btn btn-default btn-view pull-left"
                                                        href="product.php?articleId=<?php echo $articleId;?>">View</a>
                                                    <a class="btn btn-default btn-addtocart pull-right"
                                                       href="create_an_account.php">BUY NOW!</a></div>
                                            <?php }// end else
                                            ?>
                                            <div class="small-price"><span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym"></span>&nbsp;</span></div>
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
                                            </div>
                                            <?php if($check == 1){ ?>
                                                <div class="small-btns">
                                                    <button class="btn btn-default btn-compare pull-left"
                                                            data-toggle="tooltip" title="Add to Compare"><i
                                                            class="fa fa-retweet fa-fw"></i></button>
                                                    <button class="btn btn-default btn-wishlist pull-left"
                                                            data-toggle="tooltip" title="Add to Wishlist" onclick="addWish(<?php echo $articleId ?>)"><i
                                                            class="fa fa-heart fa-fw"></i></button>
                                                    <button class="btn btn-default btn-addtocart pull-left"
                                                            data-toggle="tooltip" title="Add to Cart"><i
                                                            class="fa fa-shopping-cart fa-fw"></i></button>
                                                </div>
                                            <?php  } else { ?>
                                                <div class="small-btns">
                                                    <button class="btn btn-default btn-compare pull-left"
                                                            data-toggle="tooltip" title="Add to Compare"><i
                                                            class="fa fa-retweet fa-fw"></i></button>
                                                    <button class="btn btn-default btn-wishlist pull-left"
                                                            data-toggle="tooltip" title="Add to Wishlist" onclick="window.location.href='signUp.php';"><i
                                                            class="fa fa-heart fa-fw"></i></button>
                                                    <button class="btn btn-default btn-addtocart pull-left"
                                                            data-toggle="tooltip" title="Add to Cart" onclick="window.location.href='signUp.php';"><i
                                                            class="fa fa-shopping-cart fa-fw"></i></button>
                                                </div>
                                            <?php  } ?>
                                        </div>
                                        <div class="meta-back"></div>
                                    </div>
                                </div>
                                    <?php
                                    }// end else
                                }// end while loop
                                ?>
                            </div>
                        </div>
                        <!-- end: Items Row -->

                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-block sidebar" style="padding: 0px">
            <?php include "specials.php";?>
        </div>
    </div>
</div>
<div class="row clearfix f-space30"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span>SALE</span></div>
            <div class="box-content">
                <div class="box-products slide" id="productc2">
                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc2"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc2"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    <div class="carousel-inner">
                        <!-- Items Row -->
                        <div class="item active">
                            <div class="row box-product">
                                <?php

                                $sql = "SELECT articleId,price,articleName,picture1,discount FROM article where Sale='1' limit 16";
                                $result=mysqli_query($connection,$sql);
                                $slideCount = 0;
                                while($table_record=mysqli_fetch_array($result)) {
                                $articleName = $table_record['articleName'];
                                $articleId = $table_record['articleId'];
                                $price = $table_record['price'];
                                $picture1 = $table_record['picture1'];
                                $discount = $table_record['discount'];
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
                                if ($slideCount%5 !== 0 ) {

                                    ?>
                                    <!-- Product -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="product-block">
                                            <div class="image">
                                                <div class="product-label product-sale"><span>SALE</span></div>
                                                <a class="img"
                                                   href="product.php?articleId=<?php echo $articleId;?>"><img
                                                        alt="product info"
                                                        src="images/products/<?php echo $picture1;?>"
                                                        title="product title"></a></div>
                                            <div class="product-meta">
                                                <div class="name"><a
                                                        href="product.php?articleId=<?php echo $articleId;?>"><?php echo $articleName;?></a>
                                                </div>
                                                <?php if($discount > 0) { ?>
                                                    <div class="big-price"><span class="price-new"><span
                                                                class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price;?></span></div>
                                                <?php
                                                } else { ?>
                                                    <div class="big-price"><span class="price-new"><span
                                                                class="sym">Rs.</span><?php echo $price;?></span>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($check !== false) { //check if user is logged in or not?>
                                                    <div class="big-btns"><a
                                                            class="btn btn-default btn-view pull-left"
                                                            href="product.php?articleId=<?php echo $articleId; ?>">View</a>
                                                        <a class="btn btn-default btn-addtocart pull-right"
                                                           onclick="addtocart(<?php echo $articleId; ?>)" href="#">BUY
                                                            NOW!</a></div>
                                                <?php }// end if
                                                else {
                                                    ?>
                                                    <div class="big-btns"><a
                                                            class="btn btn-default btn-view pull-left"
                                                            href="product.php?articleId=<?php echo $articleId;?>">View</a>
                                                        <a class="btn btn-default btn-addtocart pull-right"
                                                           href="create_an_account.php">BUY NOW!</a></div>
                                                <?php }// end else
                                                ?>
                                                <div class="small-price"><span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym"></span>&nbsp;</span></div>
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
                                                </div>
                           
                                            </div>
                                            <div class="meta-back"></div>
                                        </div>
                                    </div>
                                    <!-- end: Product -->
                                <?php }// end if condition
                                else
                                {
                                ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row box-product">
                                <!-- Product -->
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="product-block">
                                        <div class="image">
                                            <div class="product-label product-sale"><span>SALE</span></div>
                                            <a class="img"
                                               href="product.php?articleId=<?php echo $articleId;?>"><img
                                                    alt="product info"
                                                    src="images/products/<?php echo $picture1;?>"
                                                    title="product title"></a></div>
                                        <div class="product-meta">
                                            <div class="name"><a
                                                    href="product.php?articleId=<?php echo $articleId;?>"><?php echo $articleName;?></a>
                                            </div>
                                            <?php if($discount > 0) { ?>
                                                <div class="big-price"><span class="price-new"><span
                                                            class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price;?></span></div>
                                            <?php
                                            } else { ?>
                                                <div class="big-price"><span class="price-new"><span
                                                            class="sym">Rs.</span><?php echo $price;?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($check !== false) { //check if user is logged in or not?>
                                                <div class="big-btns"><a
                                                        class="btn btn-default btn-view pull-left"
                                                        href="product.php?articleId=<?php echo $articleId; ?>">View</a>
                                                    <a class="btn btn-default btn-addtocart pull-right"
                                                       onclick="addtocart(<?php echo $articleId; ?>)" href="#">BUY
                                                        NOW!</a></div>
                                            <?php }// end if
                                            else {
                                                ?>
                                                <div class="big-btns"><a
                                                        class="btn btn-default btn-view pull-left"
                                                        href="product.php?articleId=<?php echo $articleId;?>">View</a>
                                                    <a class="btn btn-default btn-addtocart pull-right"
                                                       href="create_an_account.php">BUY NOW!</a></div>
                                            <?php }// end else
                                            ?>
                                            <div class="small-price"><span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym"></span>&nbsp;</span></div>
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
                                                }
                                            ?>
                                            </div>
                                            <?php if($check == 1){ ?>
                                                <div class="small-btns">
                                                    <button class="btn btn-default btn-compare pull-left"
                                                            data-toggle="tooltip" title="Add to Compare"><i
                                                            class="fa fa-retweet fa-fw"></i></button>
                                                    <button class="btn btn-default btn-wishlist pull-left"
                                                            data-toggle="tooltip" title="Add to Wishlist" onclick="addWish(<?php echo $articleId ?>)"><i
                                                            class="fa fa-heart fa-fw"></i></button>
                                                    <button class="btn btn-default btn-addtocart pull-left"
                                                            data-toggle="tooltip" title="Add to Cart"><i
                                                            class="fa fa-shopping-cart fa-fw"></i></button>
                                                </div>
                                            <?php  } else { ?>
                                                <div class="small-btns">
                                                    <button class="btn btn-default btn-compare pull-left"
                                                            data-toggle="tooltip" title="Add to Compare"><i
                                                            class="fa fa-retweet fa-fw"></i></button>
                                                    <button class="btn btn-default btn-wishlist pull-left"
                                                            data-toggle="tooltip" title="Add to Wishlist" onclick="window.location.href='signUp.php';"><i
                                                            class="fa fa-heart fa-fw"></i></button>
                                                    <button class="btn btn-default btn-addtocart pull-left"
                                                            data-toggle="tooltip" title="Add to Cart" onclick="window.location.href='signUp.php';"><i
                                                            class="fa fa-shopping-cart fa-fw"></i></button>
                                                </div>
                                            <?php  } ?>
                                        </div>
                                        <div class="meta-back"></div>
                                    </div>
                                </div>
                                <?php
                                }// end else
                                }// end while loop
                                ?>
                            </div>
                        </div>
                        <!-- end: Items Row -->

                        <!-- end: Items Row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix f-space30"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span>Recent Products</span></div>
            <div class="box-content">
                <div class="box-products slide" id="productc3">
                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc3"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc3"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    <div class="carousel-inner">
                        <!-- Items Row -->
                        <div class="item active">
                            <div class="row box-product">
                                <?php
                                $sql = "SELECT articleId,price,articleName,picture1,discount FROM article group by articleId desc limit 16";
                                $result=mysqli_query($connection,$sql);
                                $slideCount = 0;
                                while($table_record=mysqli_fetch_array($result)) {
                                $articleName = $table_record['articleName'];
                                $articleId = $table_record['articleId'];
                                $price = $table_record['price'];
                                $picture1 = $table_record['picture1'];
                                $discount = $table_record['discount'];
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
                                if ($slideCount%5 !== 0) {

                                    ?>
                                    <!-- Product -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="product-block">
                                            <div class="image">
                                                <div class="product-label product-sale"><span>SALE</span></div>
                                                <a class="img"
                                                   href="product.php?articleId=<?php echo $articleId;?>"><img
                                                        alt="product info"
                                                        src="images/products/<?php echo $picture1;?>"
                                                        title="product title"></a></div>
                                            <div class="product-meta">
                                                <div class="name"><a
                                                        href="product.php?articleId=<?php echo $articleId;?>"><?php echo $articleName;?></a>
                                                </div>
                                                <?php if($discount > 0) { ?>
                                                <div class="big-price"><span class="price-new"><span
                                                            class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price;?></span></div>
                                                <?php
                                                } else { ?>
                                                    <div class="big-price"><span class="price-new"><span
                                                                class="sym">Rs.</span><?php echo $price;?></span>
                                                        </div>
                                                <?php } ?>
                                                <?php if ($check !== false) { //check if user is logged in or not?>
                                                    <div class="big-btns"><a
                                                            class="btn btn-default btn-view pull-left"
                                                            href="product.php?articleId=<?php echo $articleId; ?>">View</a>
                                                        <a class="btn btn-default btn-addtocart pull-right"
                                                           onclick="addtocart(<?php echo $articleId; ?>)" href="#">BUY
                                                            NOW!</a></div>
                                                <?php }// end if
                                                else {
                                                    ?>
                                                    <div class="big-btns"><a
                                                            class="btn btn-default btn-view pull-left"
                                                            href="product.php?articleId=<?php echo $articleId;?>">View</a>
                                                        <a class="btn btn-default btn-addtocart pull-right"
                                                           href="create_an_account.php">BUY NOW!</a></div>
                                                <?php }// end else
                                                ?>
                                                <div class="small-price"><span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym"></span>&nbsp;</span></div>
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
                                                    } */?>
                                                <!--</div>-->
                                                <?php if($check == 1){ ?>
                                                    <div class="small-btns">
                                                        <button class="btn btn-default btn-compare pull-left"
                                                                data-toggle="tooltip" title="Add to Compare"><i
                                                                class="fa fa-retweet fa-fw"></i></button>
                                                        <button class="btn btn-default btn-wishlist pull-left"
                                                                data-toggle="tooltip" title="Add to Wishlist" onclick="addWish(<?php echo $articleId ?>)"><i
                                                                class="fa fa-heart fa-fw"></i></button>
                                                        <button class="btn btn-default btn-addtocart pull-left"
                                                                data-toggle="tooltip" title="Add to Cart"><i
                                                                class="fa fa-shopping-cart fa-fw"></i></button>
                                                    </div>
                                                <?php  } else { ?>
                                                    <div class="small-btns">
                                                        <button class="btn btn-default btn-compare pull-left"
                                                                data-toggle="tooltip" title="Add to Compare"><i
                                                                class="fa fa-retweet fa-fw"></i></button>
                                                        <button class="btn btn-default btn-wishlist pull-left"
                                                                data-toggle="tooltip" title="Add to Wishlist" onclick="window.location.href='signUp.php';"><i
                                                                class="fa fa-heart fa-fw"></i></button>
                                                        <button class="btn btn-default btn-addtocart pull-left"
                                                                data-toggle="tooltip" title="Add to Cart" onclick="window.location.href='signUp.php';"><i
                                                                class="fa fa-shopping-cart fa-fw"></i></button>
                                                    </div>
                                                <?php  } ?>
                                            </div>
                                            <div class="meta-back"></div>
                                        </div>
                                    </div>
                                    <!-- end: Product -->
                                <?php }// end if condition
                                else
                                {
                                ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row box-product">
                                <!-- Product -->
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="product-block">
                                        <div class="image">
                                            <div class="product-label product-sale"><span>SALE</span></div>
                                            <a class="img"
                                               href="product.php?articleId=<?php echo $articleId;?>"><img
                                                    alt="product info"
                                                    src="images/products/<?php echo $picture1;?>"
                                                    title="product title"></a></div>
                                        <div class="product-meta">
                                            <div class="name"><a
                                                    href="product.php?articleId=<?php echo $articleId;?>"><?php echo $articleName;?></a>
                                            </div>
                                            <div class="big-price"><span class="price-new"><span
                                                        class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price;?></span></div>
                                            <?php if ($check !== false) { //check if user is logged in or not?>
                                                <div class="big-btns"><a
                                                        class="btn btn-default btn-view pull-left"
                                                        href="product.php?articleId=<?php echo $articleId; ?>">View</a>
                                                    <a class="btn btn-default btn-addtocart pull-right"
                                                       onclick="addtocart(<?php echo $articleId; ?>)" href="#">BUY
                                                        NOW!</a></div>
                                            <?php }// end if
                                            else {
                                                ?>
                                                <div class="big-btns"><a
                                                        class="btn btn-default btn-view pull-left"
                                                        href="product.php?articleId=<?php echo $articleId;?>">View</a>
                                                    <a class="btn btn-default btn-addtocart pull-right"
                                                       href="create_an_account.php">BUY NOW!</a></div>
                                            <?php }// end else
                                            ?>
                                            <div class="small-price"><span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym"></span>&nbsp;</span></div>
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
                                                }*/ ?>
                                            <!--</div>-->
                                            <?php if($check == 1){ ?>
                                                <div class="small-btns">
                                                    <button class="btn btn-default btn-compare pull-left"
                                                            data-toggle="tooltip" title="Add to Compare"><i
                                                            class="fa fa-retweet fa-fw"></i></button>
                                                    <button class="btn btn-default btn-wishlist pull-left"
                                                            data-toggle="tooltip" title="Add to Wishlist" onclick="addWish(<?php echo $articleId ?>)"><i
                                                            class="fa fa-heart fa-fw"></i></button>
                                                    <button class="btn btn-default btn-addtocart pull-left"
                                                            data-toggle="tooltip" title="Add to Cart"><i
                                                            class="fa fa-shopping-cart fa-fw"></i></button>
                                                </div>
                                            <?php  } else { ?>
                                                <div class="small-btns">
                                                    <button class="btn btn-default btn-compare pull-left"
                                                            data-toggle="tooltip" title="Add to Compare"><i
                                                            class="fa fa-retweet fa-fw"></i></button>
                                                    <button class="btn btn-default btn-wishlist pull-left"
                                                            data-toggle="tooltip" title="Add to Wishlist" onclick="window.location.href='signUp.php';"><i
                                                            class="fa fa-heart fa-fw"></i></button>
                                                    <button class="btn btn-default btn-addtocart pull-left"
                                                            data-toggle="tooltip" title="Add to Cart" onclick="window.location.href='signUp.php';"><i
                                                            class="fa fa-shopping-cart fa-fw"></i></button>
                                                </div>
                                            <?php  } ?>
                                        </div>
                                        <div class="meta-back"></div>
                                    </div>
                                </div>
                                <?php
                                }// end else
                                }// end while loop
                                ?>
                            </div>
                        </div>
                        <!-- end: Items Row -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix f-space30"></div>

<!-- end: Products -->
<!-- Rectangle Banners -->
<?php include "banners.php";?>
<!-- end: Rectangle Banners -->
<!-- Widgets -->
<div class="row clearfix f-space30"></div>
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-block sidebar" style="padding: 0px">

            <!-- Best Sellers Products -->
            <?php include "best_sellers.php";?>
            <!-- end: Best Sellers Products -->
            <div class="row clearfix f-space10"></div>
            <!-- Get Updates Box -->

        </div>
            <!-- end: Get Updates Box -->
        <!-- end: Sidebar -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
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
                                           <div class="brands-row item active">
                                               <div class=""><a href="#a"><img src="images/certficate%201.jpg" height="213px" alt=""></a></div>
                                           </div>
                                       <div class="brands-row item">
                                           <div class=""><a href="#a"><img src="images/certficate%202.jpg" height="213px" alt=""></a></div>
                                       </div>
                                       <div class="brands-row item">
                                           <div class=""><a href="#a"><img src="images/certficate%203.jpg" height="213px" alt=""></a></div>
                                       </div>
                                       <div class="brands-row item">
                                           <div class=""><a href="#a"><img src="images/certficate%204.jpg" height="213px" alt=""></a></div>
                                       </div>
                                       <div class="brands-row item">
                                           <div class=""><a href="#a"><img src="images/certficate%205.jpg" height="213px" alt=""></a></div>
                                       </div>
                                       <div class="brands-row item">
                                           <div class=""><a href="#a"><img src="images/certficate%206.jpg" height="213px" alt=""></a></div>
                                       </div>
                                       <div class="brands-row item">
                                           <div class=""><a href="#a"><img src="images/certficate%207.jpg" height="213px" alt=""></a></div>
                                       </div>
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
                        <div class="brands-row item active">
                            <div class="brand-logo"><a href="#a"><img height="130px" src="images/icons/coca%20cola.jpg" alt=""></a></div>
                            <div class="brand-logo"><a href="#a"><img height="130px" src="images/icons/butt%20sweets.jpg" alt=""></a></div>
                            <div class="brand-logo"><a href="#a"><img height="130px" src="images/icons/mc%20donalds.jpg" alt=""></a></div>
                            <div class="brand-logo"><a href="#a"><img height="130px" src="images/icons/techAgentx%20logo2.jpg" alt=""></a></div>
                        </div>
                        <div class="brands-row item">
                            <div class="brand-logo"><a href="#a"><img height="130px" src="images/icons/fri%20chicks.jpg" alt=""></a></div>
                            <div class="brand-logo"><a href="#a"><img height="130px" src="images/icons/Zong.jpg" alt=""></a></div>
                            <div class="brand-logo"><a href="#a"><img height="130px" src="images/icons/unilever.jpeg" alt=""></a></div>
                            <div class="brand-logo"><a href="#a"><img height="130px" src="images/icons/mini-slider1.jpg" alt=""></a></div>
                        </div>
                    </div>
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
            interval: 4000
        });
        $('#brands').carousel({
            interval: 4000
        });
        $('#productc2').carousel({
            interval: 4000
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



</script>
</body>
</html>