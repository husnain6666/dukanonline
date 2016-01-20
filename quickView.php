<!-- Quick View modal -->
<div class="modal fade" id="myModal<?=$modalCount?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-body">

              <div class="single-product">
                  <!-- Images -->
                  <div class="images col-md-6 col-sm-12 col-xs-12">
                      <div class="row">
                          <!-- Small Images -->
                          <div class="thumbs col-md-3 col-sm-3 col-xs-3"  id="thumbs">
                              <ul>
                                  <li class="" onclick="changeImage('<?php echo $picture1?>', <?=$modalCount?>)"><a href="#a" data-image="images/products/<?php echo $picture1?>" data-zoom-image="images/products/<?php echo $picture1?>" class="elevatezoom-gallery active" ><img src="images/products/<?php echo $picture1?>" alt="small image" /></a></li>
                                  <?php
                                  if($picture2 != "")
                                  {
                                      ?>
                                      <li class="" onclick="changeImage('<?php echo $picture2?>', <?=$modalCount?>)"> <a href="#a" data-image="images/products/<?php echo $picture2?>" data-zoom-image="images/products/<?php echo $picture2?>"  class="elevatezoom-gallery" > <img src="images/products/<?php echo $picture2?>" alt="small image" /></a></li>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if($picture3 != "")
                                  {
                                      ?>
                                      <li class="" onclick="changeImage('<?php echo $picture3?>', <?=$modalCount?>)"> <a href="#a" data-image="images/products/<?php echo $picture3?>" data-zoom-image="images/products/<?php echo $picture3?>" class="elevatezoom-gallery"><img src="images/products/<?php echo $picture3?>" alt="small image" /></a></li>
                                  <?php
                                  }
                                  ?>
                              </ul>
                          </div>
                          <!-- end: Small Images -->
                          <!-- Big Image and Zoom -->
                          <div class="big-image col-md-9 col-sm-9 col-xs-9" id="big-img"> <img id="product-image<?=$modalCount?>" src="images/products/<?php echo $picture1?>"  alt="big image" /> </div>
                          <!-- end: Big Image and Zoom -->


                      </div>
                  </div>

                  <!-- end: Images -->

                  <div class="product-details col-md-6">

                      <!-- Title and rating info -->
                      <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="title">
                                <h1><?=$articleName?></h1>
                                <div class="rating">
                                    <?php
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
                                    This product has <?=$totalRatings?> reviews
                                </div>
                              </div>
                          </div>
                      </div>


                        <div class="row">
                            <div class="price-wr col-md-6 col-sm-6 col-xs-12">
                                <div class="big-price"> <span class="price-old" style="font-size: 15px"><span class="sym">$</span><?=$price?></span> <span class="price-new" style="font-size: 25px"><span class="sym">$</span><?=$discountedPrice?></span> </div>
                            </div>
                            <div class="product-btns-wr col-md-6 col-sm-6 col-xs-12">
                                <div class="product-btns">
                                    <div style="height:3px" class="col-md-12 col-sm-12 col-xs-12"></div>
                                    <button class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> <i class="fa fa-shopping-cart fa-fw"></i> Add to Cart </button>
                                    <div style="height:6px" class="col-md-12 col-sm-12 col-xs-12"></div>
                                    <button class="btn btn-warning col-md-6 col-sm-6 col-xs-6" onclick="addToCompare(<?=$articleId?>, '<?=$articleName?>')"
                                            data-toggle="tooltip" title="Add to Compare">
                                        <i class="fa fa-retweet fa-fw"></i></button>
                                    <button class="btn btn-danger col-md-6 col-sm-6 col-xs-6" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>
                                </div>
                            </div>
                        </div>
                        <!-- end: Title and rating info -->
                    </div>

                    <!-- product details -->
                    <div class="product-details">

                        <div class="row">
                            <!-- Availability, Product Code, Brand and short info -->
                            <div class="short-info-wr col-md-12 col-sm-12 col-xs-12">
                                <div class="short-info">
                                    <?php ?>
                                    <div class="product-attr-text">Availability: <span class="available" id="avalability"><?php if($articleQuantity == 0){echo "Out of Stock"; echo "<script>document.getElementById('avalability').style.color = 'orange';</script>";} else echo "In Stock";?></span></div>
                                    <div class="product-attr-text">Product Code: <span><?=$articleId?></span></div>
                                    <div class="product-attr-text">Brand: <span><?=$brand?></span></div>
                                    <p class="short-info-p"><?=$pieces[0]?></p>
                                </div>
                            </div>
                            <!-- end: Availability, Product Code, Brand and short info -->

                        </div>
                    </div>

                    <!-- end: product details -->

                </div>

            </div>
        </div>
    </div>
</div>

<?php $modalCount++?>
<!-- END: Quick View modal -->
