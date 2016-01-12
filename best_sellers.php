<div class="box-content">
    <div class="box-products slide carousel-fade" id="productc5">
        <ol class="carousel-indicators">

            <?php
            $carouselCount = 0;
            $limit = 0;
            $fu = 0;
            $countqry = "select count(articleId) as count from article where bestSeller = '1'";
            $result=mysqli_query($connection,$countqry);
            $table_record=mysqli_fetch_array($result);
            $limit = $table_record['count'];
            while($fu < $limit){
                $carouselCount++;
                ?>
                <li class="<?php if($carouselCount == 1){echo "active";}?>" data-slide-to="<?php echo $fu;?>" data-target="#productc5"></li>
                <?php
                $fu++;
            }// end while loop?>
        </ol>
        <div class="carousel-inner">
            <?php
            $count = 0;
            $sql = "SELECT articleId,price,articleName,picture1 FROM article where bestSeller='1' group by articleId DESC limit 8";
            $result=mysqli_query($connection,$sql);

            while($table_record=mysqli_fetch_array($result)){
                $articleName =$table_record['articleName'];
                $articleId =$table_record['articleId'];
                $price = $table_record['price'];
                $picture1 = $table_record['picture1'];
                $count++;
                ?>
                <!-- item -->
                <div class="item <?php if($count == 1){echo "active";}?>">
                    <div class="product-block">
                        <div class="image">
                            <div class="product-label product-hot"><span>HOT</span></div>
                            <a class="img" href="product.php?articleId=<?php echo $articleId;?>"><img alt="product info" src="images/products/<?php echo $picture1?>" title="product title"></a> </div>
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
    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc5"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc5"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
    <div class="nav-bg"></div>
</div>