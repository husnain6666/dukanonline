<?php
include('connectdb.php');
include "top_header.php";
?>
<!-- end: Top Heading Bar -->
<!DOCTYPE html>
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
<?php include "breadCrumbs.php";?>

<div class="row clearfix f-space10"></div>
<div class="container">
  <!-- row -->
  <div class="row">
      <div class="col-md-12 box-block">

          <!--  box content -->

          <div class="box-content">
              <!-- single product -->
              <div class="single-product">

                  <?php
                  include('connectdb.php');
                  $articleId = 1;
                  $specifications = "No Product Found";
                  if(isset($_GET['articleId']))
                  {
                  $articleId = $_GET['articleId'];
                  $sql = "SELECT specification,category,price,articleName, brand, articleId, quantity, discount, picture1, picture2, picture3 FROM article WHERE articleId='$articleId'";
                  $result = mysqli_query($connection, $sql);
                  //if($result->num_rows > 0)
                  //{
                  try {
                      $table_record = mysqli_fetch_array($result);
                      $specifications = $table_record['specification'];
                      $price = $table_record['price'];
                      $articleName = $table_record['articleName'];
                      $brand = $table_record['brand'];
                      $category = $table_record['category'];
                      $picture1 = $table_record['picture1'];
                      $picture2 = $table_record['picture2'];
                      $picture3 = $table_record['picture3'];
                      $discountedPrice = 0;
                      $articleId = $table_record['articleId'];
                      $quantity = $table_record['quantity'];
                      $discount = $table_record['discount'];
                      $discountedPrice = ($price * $discount)/100;
                      $discountedPrice = $price - $discountedPrice;

                      $query2="SELECT count(articleId) as totalReviews FROM reviews WHERE articleId = '$articleId'";
                      $result2=mysqli_query($connection,$query2);

                      $table_record2=mysqli_fetch_array($result2);
                      $totalReviews = $table_record2['totalReviews'];
                  }
                  catch (Exception $e){
                      $e->getMessage();
                  }

                  ?>
                  <!-- Images -->
                  <div class="images col-md-6 col-sm-12 col-xs-12">
                      <div class="row">
                          <!-- Small Images -->
                          <div class="thumbs col-md-3 col-sm-3 col-xs-3"  id="thumbs">
                              <ul>
                                  <li class=""><a href="#a" data-image="images/products/<?php echo $picture1?>" data-zoom-image="images/products/<?php echo $picture1?>" class="elevatezoom-gallery active" ><img src="images/products/<?php echo $picture1?>" alt="small image" /></a></li>
                                  <?php
                                  if($picture2 != "")
                                  {
                                  ?>
                                  <li class=""> <a href="#a" data-image="images/products/<?php echo $picture2?>" data-zoom-image="images/products/<?php echo $picture2?>"  class="elevatezoom-gallery" > <img src="images/products/<?php echo $picture2?>" alt="small image" /></a></li>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if($picture3 != "")
                                  {
                                  ?>
                                  <li class=""> <a href="#a" data-image="images/products/<?php echo $picture3?>" data-zoom-image="images/products/<?php echo $picture3?>" class="elevatezoom-gallery"><img src="images/products/<?php echo $picture3?>" alt="small image" /></a></li>
                                  <?php
                                  }
                                  ?>
                              </ul>
                          </div>
                          <!-- end: Small Images -->
                          <!-- Big Image and Zoom -->
                          <div class="big-image col-md-9 col-sm-9 col-xs-9"> <img id="product-image" src="images/products/<?php echo $picture1?>" data-zoom-image="images/products/<?php echo $picture1?>" alt="big image" /> </div>
                          <!-- end: Big Image and Zoom -->
                      </div>
                  </div>

                  <!-- end: Images -->

                  <!-- product details -->

                  <div class="product-details col-md-6 col-sm-12 col-xs-12">

                      <!-- Title and rating info -->
                      <div class="title">
                          <h1><?php echo $articleName?></h1>
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
                           <span>This product has <?php echo $totalReviews?> review(s) <a href="#a">Add Review</a></span> </div>
                      </div>
                      <!-- end: Title and rating info -->

                      <div class="row">
                          <!-- Availability, Product Code, Brand and short info -->
                          <div class="short-info-wr col-md-12 col-sm-12 col-xs-12">
                              <div class="short-info">
                                  <div class="row">
                                      <div class="col-md-5">
                                        <div class="product-attr-text">Availability: <span class="available">In Stock</span></div>
                                        <div class="product-attr-text">Product Code: <span><?php echo $articleId?></span></div>
                                          <div class="product-attr-text">Brand: <span><?php echo $brand?></span></div>
                                      </div>
                                      <div class="col-md-7">
                                          <div class="short-info-opt">
                                              <!-- AddThis Button BEGIN -->
                                              <div class="social-share">
                                                  <div class="fb-like" data-href="https://www.facebook.com/www.electroshop.pk/?fref=ts" data-width="250" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <p class="short-info-p"> <?php
                                      $pieces = explode("0_0", $specifications);
                                      ?><?php echo $pieces[1];?></p>
                              </div>
                          </div>
                          <!-- end: Availability, Product Code, Brand and short info -->

                      </div>

                      <div class="row">
                          <div class="short-info-opt-wr col-md-12 col-sm-12 col-xs-12">
                              <div class="short-info-opt">
                                  <div class="att-row">
                                      <div class="qty-wr">
                                          <div class="qty-text hidden-xs">Qty:</div>
                                          <div class="quantity-inp">
                                              <input type="text" class="quantity-input" name="quantity" id="quantity" value="1">
                                          </div>
                                          <div class="quantity-txt"><a href="#a" class="qty qtyminus" ><i class="fa fa-minus fa-fw"></i></a></div>
                                          <div class="quantity-txt"><a href="#a" class="qty qtyplus" ><i class="fa fa-plus fa-fw"></i></a></div>
                                      </div>
                                      <?php
                                      // Search color in table. If color is present than show color
                                          $col_present = "select color from color where articleId = '$articleId'";
                                          $col_result = mysqli_query($connection, $col_present);
                                          $table_record8 = mysqli_fetch_array($col_result);
                                          $color_is_present = $table_record8['color'];
                                      if($color_is_present != "") {
                                          ?>
                                          <div class="color-wr">
                                              <div class="color-options">
                                                  <ul class="pull-left">
                                                      <li class="input-prepend dropdown" data-select="true"> <a class="add-on dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <span class="dropdown-display">Color</span> <i class="fa fa-sort fa-fw"></i> </a>
                                                          <!-- this hidden field is used to contain the selected option from the dropdown -->
                                                          <input class="dropdown-field" type="hidden" value="">
                                                          <ul class="dropdown-menu" role="menu">
                                                          <?php
                                                              $col_query = "select c.color from color c inner join article a on a.articleId=c.articleId where c.articleId = '$articleId'";
                                                              $col_result = mysqli_query($connection, $col_query);
                                                              while($table_record5 = mysqli_fetch_array($col_result)){
                                                              $color = $table_record5['color'];
                                                          ?>
                                                              <li><a href="#a" data-value="<?php echo $color;?>" class="border-<?php echo $color;?>"><?php echo $color;?></a></li>
                                                          <?php }// end while loop
                                                          ?>
                                                          </ul>
                                                      </li>
                                                  </ul>
                                              </div>
                                          </div>
                                        <?php
                                        }
                                      // Search size in table. If size is present than show size
                                          $size_present = "select size from size where articleId = $articleId";
                                          $size_result = mysqli_query($connection, $size_present);
                                          $table_record9 = mysqli_fetch_array($size_result);
                                          $size_is_present = $table_record9['size'];
                                      if($size_is_present != "") {
                                          // end if
                                      ?>
                                      <div class="size-wr">
                                          <div class="size-options">
                                              <ul class="pull-left">
                                                  <li class="input-prepend dropdown" data-select="true"><a
                                                          class="add-on dropdown-toggle" data-hover="dropdown"
                                                          data-toggle="dropdown" href="#a"> <span
                                                              class="dropdown-display">Size</span> <i
                                                              class="fa fa-sort fa-fw"></i> </a>
                                                      <!-- this hidden field is used to contain the selected option from the dropdown -->
                                                      <input class="dropdown-field" type="hidden" value="">
                                                      <ul class="dropdown-menu" role="menu">
                                                          <?php
                                                          $size_query = "select c.size from size c inner join article a on a.articleId=c.articleId where c.articleId = '$articleId'";
                                                          $size_result = mysqli_query($connection, $size_query);
                                                          while($table_record10 = mysqli_fetch_array($size_result)){
                                                              $size = $table_record10['size'];
                                                              ?>
                                                              <li><a href="#a" data-value="<?php echo $size;?>"><?php echo $size;?></a></li>
                                                          <?php }// end while loop
                                                          ?>
                                                      </ul>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                      <?php
                                      }// end if
                                      ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="price-wr col-md-4 col-sm-4 col-xs-12">
                              <div class="big-price"> <span class="price-old" ><span class="sym">Rs.</span><?php echo $price?></span> <span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice?></span> </div>
                          </div>
                          <?php
                          if( $check!== false ) {?>
                          ?>
                          <div class="product-btns-wr col-md-8 col-sm-8 col-xs-12">
                              <div class="product-btns">
                                  <div class="product-big-btns">
                                      <a href="cart.php?articleId=<?php echo $articleId; ?> " >   <button class="btn btn-addtocart" onclick="insertquantityinshoppingcart()"> <i class="fa fa-shopping-cart fa-fw"></i> Add to Cart </button></a>
                                      <button class="btn btn-compare" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                                      <button class="btn btn-wishlist" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>
                                      <button class="btn btn-sendtofriend" data-toggle="tooltip" title="Send to Friend"> <i class="fa fa-envelope fa-fw"></i> </button>
                                  </div>
                              </div>
                          </div>
                          <?php }
                          else {
                              ?>

                              <div class="product-btns-wr col-md-8 col-sm-8 col-xs-12">
                                  <div class="product-btns">
                                      <div class="product-big-btns">
                                          <a href="signUp.php?articleId=<?php echo $articleId; ?> " >        <button class="btn btn-addtocart" onclick="insertquantityinshoppingcart()"> > <i class="fa fa-shopping-cart fa-fw"></i> Add to Cart </button> </a>
                                          <button class="btn btn-compare" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                                          <button class="btn btn-wishlist" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>
                                          <button class="btn btn-sendtofriend" data-toggle="tooltip" title="Send to Friend"> <i class="fa fa-envelope fa-fw"></i> </button>
                                      </div>
                                  </div>
                              </div>
                          <?php
                          }
                          ?>



                      </div>
                  </div>

                  <!-- end: product details -->

              </div>

              <!-- end: single product -->

          </div>

          <!-- end: box content -->

      </div>
  </div>
  <!-- end:row -->
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>

<!-- container -->
<div class="container">
  <!-- row -->
  <div class="row">
    <!-- tabs -->
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-column box-block product-details-tabs">

      <!-- Details Info/Reviews/Tags -->
      <!-- Nav tabs -->
      <ul class="nav nav-tabs blog-tabs nav-justified">
        <li class="active"><a href="#details-info" data-toggle="tab"><i class="fa  fa-th-list fa-fw"></i> Details Info</a></li>
        <li><a href="#reviews" data-toggle="tab"><i class="fa fa-comments fa-fw"></i> Reviews</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active col-lg-12 col-md-12 col-sm-12" id="details-info">
          <p><?php
              $pieces = explode("0_0", $specifications);
              ?> <h4>INTRODUCTION</h4><?php echo $pieces[0];?>
            <h4><br>DETAILS</h4><?php echo $pieces[1];?>
            <?php
            $iparr = split("=>",$pieces[2]);
            ?>
            <h4><br>SPECIFICATIONS</h4>
            <?php foreach ($iparr as $index=> $id) {
                if($index>0)
                {?>
                    ⇒<?php echo $id;?>
                    <br>
                <?php
                }
            }
            ?>
            </p>
        </div>
        <div class="tab-pane col-lg-12 col-md-12 col-sm-12" id="reviews">
          <div class="heading"> <span><strong>"<?php echo $articleName;?>"</strong> has <?php echo $totalReviews;?> review(s)</span>
            <div class="rating"> <?php
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
                </div> </div>
          </div>
          <div class="review">
              <?php
              $revquery="SELECT  r.review, r.date, r.articleId, (SELECT firstName from userinfo where userId = r.userId) as firstName, (SELECT lastName from userinfo where userId = r.userId) as lastName, t.rating FROM reviews r inner join ratings t on r.reviewId = t.reviewId
and r.articleId = '$articleId' GROUP BY t.rating ORDER BY t.rating DESC limit 5";
              $revresult=mysqli_query($connection,$revquery);
              while($table_record1=mysqli_fetch_array($revresult)){
              $review = $table_record1['review'];
              $date = $table_record1['date'];
              $fName = $table_record1['firstName'];
              $lName = $table_record1['lastName'];
              $rating1 = $table_record1['rating'];
              ?>
            <div class="review-info">
              <div class="name"><i class="fa fa-comment-o fa-flip-horizontal fa-fw"></i> <?php echo $fName." ".$lName;?></div>
              <div class="date"> on <em><?php echo $date;?></em></div>
                <?php
                $ratingLimit = 0;

                ?>
                <div class="rating"><?php
                    while ($ratingLimit < 5) {
                        if ($ratingLimit < $rating1) {
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
            <div class="text"><?php echo $review;?></div>
          </div>
          <div class="review">
            <?php }// end while loop?>

          <div class="write-reivew" id="#write-review">
            <h3>Write a review</h3>
            <div class="fr-border"></div>

            <!-- Form -->
            <form action = "submit_review.php" method="post" onsubmit="return checkSubmitBtn();">
              <div class="row">
                <div class="col-md-4 col-xs-12"> <a name="wr"> </a>
                    <input type="text" name = "rated" id="rated" hidden="true"/>
                  <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" onclick="postToController()"/>
                    <label for="star5" title="Rocks!" class="fa fa-star">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" onclick="postToController()"/>
                    <label for="star4" title="Pretty good" class="fa fa-star">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" onclick="postToController()"/>
                    <label for="star3" title="Cool" class="fa fa-star">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" onclick="postToController()"/>
                    <label for="star2" title="Kinda bad" class="fa fa-star">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" onclick="postToController()"/>
                    <label for="star1" title="Oops!" class="fa fa-star">1 star</label>
                  </fieldset>
                </div>

                <div class="col-md-8 col-xs-12">
                    <textarea id="review-textarea" name="reviewText" rows="8" placeholder="Type your review here..."></textarea>
                </div>
                  <div class="char-counter" style="margin-right: 13px">
                      <label>Characters written</label>
                      <input data-target="#review-textarea" type="text">
                  </div>
              </div>
                <input type="text" hidden="true" name="alpha" value="<?php echo $articleId; ?>">
              <button class="btn normal color1 pull-right" type="submit">Submit</button>
            </form>
            <!-- end: Form -->
          </div>
        </div>
      </div>
      <!-- end: Tab panes -->
      <!-- end: Details Info/Reviews/Tags -->
      <div class="clearfix f-space30"></div>
    </div>
    <!-- end: tabs -->
</div>
    <!-- sidebar -->
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 main-column box-block product-details-tabs" style="padding: 0px">
            <?php include "specials.php";?>
          <div class="clearfix f-space30"></div>
      </div>
    <!-- end: sidebar -->

  </div>
  <!-- row -->
</div>
<!-- end: container -->

<!-- Relate Products -->

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
      <div class="box-heading"><span>Related Products</span></div>
      <div class="box-content">
        <div class="box-products slide" id="productc3">
          <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc3"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc3"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
          <div class="carousel-inner">
            <!-- Items Row -->
              <div class="item active">
                  <div class="row box-product">
                      <?php
                      include "connectdb.php";
                      $articleId = $_GET['articleId'];
                      if( !isset($category) )
                      {
                          $category = "Air Conditioner";
                      }
                      $sql1_R = "SELECT articleId,price,articleName,picture1,discount FROM article WHERE category='$category' and articleId != '$articleId' Limit 10";
                      $result1_R = mysqli_query($connection, $sql1_R);
                      $slideCount = 0;

                      while($table_record1_R=mysqli_fetch_array($result1_R)){
                      $price_R = $table_record1_R['price'];
                      $articleName_R = $table_record1_R['articleName'];
                      $picture1_R = $table_record1_R['picture1'];
                      $articleId_R = $table_record1_R['articleId'];
                      $discount = $table_record1_R['discount'];
                      $discountedPrice = ($price_R * $discount) / 100;
                      $discountedPrice = $price_R - $discountedPrice;

                      $query3_R = "select (select count(rating) from ratings where articleId = '$articleId_R') as totalRating, SUM(rating) as sumRating from ratings where articleId = '$articleId_R'";
                      $result3_R=mysqli_query($connection,$query3_R);

                      $table_record3_R=mysqli_fetch_array($result3_R);
                      $slideCount++;
                      $totalRatings_R = $table_record3_R['totalRating'];
                      $ratingSum_R = $table_record3_R['sumRating'];
                      if($ratingSum_R !=0 || $totalRatings_R != 0)
                      {
                          $avgRating_R = $ratingSum_R/$totalRatings_R;
                      }
                      else
                      {
                          $avgRating_R = 5;
                      }

                      if ($slideCount%4 !== 0 ) {

                          ?>
                          <!-- Product -->
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <div class="product-block">
                                  <div class="image">
                                      <div class="product-label product-sale"><span>SALE</span></div>
                                      <a class="img"
                                         href="product.php?articleId=<?php echo $articleId_R;?>"><img
                                              alt="product info"
                                              src="images/products/<?php echo $picture1_R?>"
                                              title="product title"></a></div>
                                  <div class="product-meta">
                                      <div class="name"><a
                                              href="product.php?articleId=<?php echo $articleId_R;?>"><?php echo $articleName_R;?></a>
                                      </div>
                                      <div class="big-price"><span class="price-new"><span
                                                  class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price_R;?></span></div>
                                      <?php if ($check !== false) { //check if user is logged in or not?>
                                          <div class="big-btns"><a
                                                  class="btn btn-default btn-view pull-left"
                                                  href="product.php?articleId=<?php echo $articleId_R; ?>">View</a>
                                              <a class="btn btn-default btn-addtocart pull-right"
                                                 onclick="addtocart(<?php echo $articleId_R ?>)" href="#">BUY
                                                  NOW!</a></div>
                                      <?php }// end if
                                      else {
                                          ?>
                                          <div class="big-btns"><a
                                                  class="btn btn-default btn-view pull-left"
                                                  href="product.php?articleId=<?php echo $articleId_R;?>">View</a>
                                              <a class="btn btn-default btn-addtocart pull-right"
                                                 href="create_an_account.php">BUY NOW!</a></div>
                                      <?php }// end else
                                      ?>
                                      <div class="small-price"><span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price_R;?></span></div>
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
                                      <div class="small-btns">
                                          <button class="btn btn-default btn-compare pull-left"
                                                  data-toggle="tooltip" title="Add to Compare"><i
                                                  class="fa fa-retweet fa-fw"></i></button>
                                          <button class="btn btn-default btn-wishlist pull-left"
                                                  data-toggle="tooltip" title="Add to Wishlist"><i
                                                  class="fa fa-heart fa-fw"></i></button>
                                          <button class="btn btn-default btn-addtocart pull-left"
                                                  data-toggle="tooltip" title="Add to Cart"><i
                                                  class="fa fa-shopping-cart fa-fw"></i></button>
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
                                     href="product.php?articleId=<?php echo $articleId_R;?>"><img
                                          alt="product info"
                                          src="images/products/<?php echo $picture1_R?>"
                                          title="product title"></a></div>
                              <div class="product-meta">
                                  <div class="name"><a
                                          href="product.php?articleId=<?php echo $articleId_R;?>"><?php echo $articleName_R;?></a>
                                  </div>
                                  <div class="big-price"><span class="price-new"><span
                                              class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price_R;?></span></div>
                                  <?php if ($check !== false) { //check if user is logged in or not?>
                                      <div class="big-btns"><a
                                              class="btn btn-default btn-view pull-left"
                                              href="product.php?articleId=<?php echo $articleId_R; ?>">View</a>
                                          <a class="btn btn-default btn-addtocart pull-right"
                                             onclick="addtocart(<?php echo $articleId_R ?>)" href="#">BUY
                                              NOW!</a></div>
                                  <?php }// end if
                                  else {
                                      ?>
                                      <div class="big-btns"><a
                                              class="btn btn-default btn-view pull-left"
                                              href="product.php?articleId=<?php echo $articleId_R;?>">View</a>
                                          <a class="btn btn-default btn-addtocart pull-right"
                                             href="create_an_account.php">BUY NOW!</a></div>
                                  <?php }// end else
                                  ?>
                                  <div class="small-price"><span class="price-new"><span class="sym">Rs.</span><?php echo $discountedPrice;?></span>
                                                        <span class="price-old"><span
                                                                class="sym">Rs.</span><?php echo $price_R;?></span></div>
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
                                  <div class="small-btns">
                                      <button class="btn btn-default btn-compare pull-left"
                                              data-toggle="tooltip" title="Add to Compare"><i
                                              class="fa fa-retweet fa-fw"></i></button>
                                      <button class="btn btn-default btn-wishlist pull-left"
                                              data-toggle="tooltip" title="Add to Wishlist"><i
                                              class="fa fa-heart fa-fw"></i></button>
                                      <button class="btn btn-default btn-addtocart pull-left"
                                              data-toggle="tooltip" title="Add to Cart"><i
                                              class="fa fa-shopping-cart fa-fw"></i></button>
                                  </div>
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

<?php }
        else
        { ?>
        <label style="color: red; margin-left:100px ;">No Product Found!</label>
<?php   }
?>

<!-- end: Related products -->

<!-- Rectangle Banners -->

<?php include "banners.php";?>
<!-- end: Rectangle Banners -->

<div class="row clearfix f-space30"></div>

<!-- footer -->
<?php include "footer.php";?>
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
<script src="js/jquery.elevatezoom.js" type="text/javascript"></script>
<script src="js/charCount.js" type="text/javascript"></script>
<script src="js/notie.js" type="text/javascript"></script>
<script>

(function($) {
  "use strict";
  //Mega Menu
 $('#menuMega').menu3d();

              //Help/Contact Number/Quick Message
			$('.quickbox').carousel({
				interval: 10000
			});

			//SPECIALS
			$('#productc2').carousel({
				interval: 4000
			});
			//RELATED PRODUCTS
			$('#productc3').carousel({
				interval: 4000
			});

			//Zoom Product
			$("#product-image").elevateZoom({
												  zoomType : "inner",
												  cursor : "crosshair",
												  easing: true,
												   gallery: "thumbs",
												   galleryActiveClass: "active",
												  loadingIcon : true
												});
			$("#product-image").bind("click", function(e) {
  var ez =   $('#product-image').data('elevateZoom');
  ez.closeAll(); //NEW: This function force hides the lens, tint and window
	//$.fancybox(ez.getGalleryList());
  return false;
});
})(jQuery);

 </script>
</body>
<script>
    var ratings = "";
    var ratingDone = false;

    function checkSubmitBtn()
    {
        var text = document.getElementById("review-textarea").value;
        if( text.length == 0 || text.length < 50 || text.length > 1000 )
        {
            notie.alert(3, 'Please Submit a valid review, Review must be atleast 50 characters long', 2);
            //document.getElementById("error").innerHTML = "<span style='color:red'>Please Submit a valid review, Review must be atleast 50 characters long</span>";
            return false;
        }
        else
        {
            if(ratingDone == false)
            {
                notie.alert(3, 'Please rate the product!', 1);
                //document.getElementById("ratingLabel").innerHTML = "<span style='color:red'>Please rate the product</span>";
                return false;
            }
            else {
                document.getElementById("rated").value = ratings;
                //document.getElementById("error").innerHTML = "";
                return true;
            }
        }
    }

    function postToController() {
        for (i = 0; i < document.getElementsByName('rating').length; i++) {
            if (document.getElementsByName('rating')[i].checked == true) {
                var ratingValue = document.getElementsByName('rating')[i].value;
                ratingDone = true;
                //document.getElementById("ratingLabel").innerHTML = "";
                var text = document.getElementById("review-textarea").value;
                break;
            }
        }
        ratings = ratingValue;
    }

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</html>