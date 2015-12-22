<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-block sidebar">
    <div class="box-heading"><span>Specials</span></div>
    <div class="box-content">
        <div class="box-products slide carousel-fade" id="productc2">
            <ol class="carousel-indicators">
                <?php
                include "connectdb.php";
                $carouselCount1 = 0;
                $limit1 = 0;
                $fu1 = 0;
                $countqry1 = "select count(articleId) as count from article where weekDeal = '1'";
                $result1=mysqli_query($connection,$countqry1);
                $table_record1=mysqli_fetch_array($result1);
                $limit1 = $table_record1['count'];
                while($fu1 < $limit1){
                    $carouselCount1++;
                    ?>
                    <li class="<?php if($carouselCount1 == 1){echo "active";}?>" data-slide-to="<?php echo $fu1;?>" data-target="#productc4"></li>
                    <?php
                    $fu1++;
                }// end while loop?>
            </ol>
            <div class="carousel-inner">
                <!-- item -->
                <?php
                $count = 0;
                include "connectdb.php";
                $sql = "SELECT articleId,price,articleName,picture1 FROM article where weekDeal='1' group by articleId DESC limit 8";
                $result=mysqli_query($connection,$sql);

                while($table_record=mysqli_fetch_array($result)) {
                    $articleName = $table_record['articleName'];
                    $articleId = $table_record['articleId'];
                    $price = $table_record['price'];
                    $picture1 = $table_record['picture1'];
                    $count++;
                    ?>
                    <div class="item <?php if($count == 1){echo "active";}?>">
                        <div class="product-block">
                            <div class="image">
                                <div class="product-label product-hot"><span>HOT</span></div>
                                <a class="img" href="product.php?articleId=<?php echo $articleId;?>"><img alt="product info" src="fonts/images/products/<?php echo $picture1?>" title="product title"></a> </div>
                            <div class="product-meta">
                                <div class="name"><a href="product.php?articleId=<?php echo $articleId;?>"><?php echo $articleName?></a></div>
                                <div class="big-price"> <span class="price-new"><span class="sym">Rs.</span><?php echo $price?></span> </div>

                                <?php        if( $check!== false ) { //check if user is logged in or not?>
                                    <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="product.php?articleId=<?php echo $articleId;?>">View</a> <a class="btn btn-default btn-addtocart pull-right" onclick="addtocart(<?php echo $articleId ?>)" href="#">BUY NOW!</a> </div>
                                <?php }// end if
                                else{?>
                                    <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="product.php?articleId=<?php echo $articleId;?>">View</a> <a class="btn btn-default btn-addtocart pull-right" href="create_an_account.php">BUY NOW!</a> </div>
                                <?php }// end else?>

                            </div>
                            <div class="meta-back"></div>
                        </div>
                    </div>
                <?php }?>
                <!-- end: item -->
            </div>
        </div>

        <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc2"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc2"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
        <div class="nav-bg"></div>
    </div>
</div>