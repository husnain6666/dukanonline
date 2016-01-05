<!DOCTYPE html>
<?php
include("connectdb.php");
include "top_header.php";
$check = false; //REMOVE IT AFTER IMPLEMENTING SESSION
$userId = 1; //REMOVE IT AFTER IMPLEMENTING SESSION
$counter = 0;

if(isset($_GET["minPrice"])) {
    $minPrice = $_GET["minPrice"];
}
if(isset($_GET["maxPrice"])) {
    $maxPrice = $_GET["maxPrice"];
}
if(isset($_GET["color"])) {
    $color = $_GET["color"];
}
if(isset($_GET["sortBy"])) {
    $sortBy = $_GET["sortBy"];
}
else {
    $sortBy = 'l_price';
}
if($sortBy == 'l_price') {
    $orderBy = 'price';
    $orderByValue = 'ASC';
}
else if($sortBy == 'h_price') {
    $orderBy = 'price';
    $orderByValue = 'DESC';
}
else if($sortBy == 'rating') {
    $orderBy = 'rating';
    $orderByValue = 'ASC';
}
else if($sortBy == 'recent') {
    $orderBy = 'date';
    $orderByValue = 'DESC';
}

if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
else {
    $page=1;
}
if (isset($_GET["perPage"])) {
    $per_page = $_GET["perPage"];
}
$per_page=12;

$start_from = ($page-1) * $per_page;

        // Page will start from 0 and Multiple by Per Page
        //  $start_from = ($page-1) * $per_page;


          if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET["minPrice"]) && isset($_GET["maxPrice"]))
          {
              if(isset($_GET["color"]) && $color != 'null')
              {
                  $sql = "SELECT a.articleId FROM article as a INNER JOIN color as c ON a.articleId = c.articleId WHERE a.price <= '$maxPrice' AND a.price >= '$minPrice' AND c.color = '$color'";
              }
              else
              {
                  $sql = "SELECT articleId FROM article where price <= '$maxPrice' AND price >= '$minPrice'";
              }
          }
          else
          {
              $sql = "SELECT articleId FROM article";
          }

          $result3 = mysqli_query($connection, $sql);

          $total_records = mysqli_num_rows($result3);

            $total_pages=ceil($total_records / $per_page);
          $i=1;
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
      <?php include("main_bar.php");?>
    </div>
  </div>
</header>
<!-- end: Header -->

<div class="row clearfix"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="breadcrumb dark"> <a href="index.html"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="category-grid.php"> Category Grid </a> </div>

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
<div class="row clearfix f-space10"></div>
<div class="container">
  <!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 box-block">
    <!--Compare products-->

      <?php
      $i=1;
      if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET["compItem1"]) && isset($_GET["compItem2"]))
      {
          $cmpItemCount = 2;

          $cmpItem1 = $_GET["compItem1"];
          $cmpItem2 = $_GET["compItem2"];
          //echo $_GET["compItem1"]."<br>";
          //echo $_GET["compItem2"]."<br>";

          if(isset($_GET["compItem3"]))
          {
              if($_GET["compItem3"] != "No Item Selected")
              {
                  $cmpItem3 = $_GET["compItem3"];
                  //echo $_GET["compItem3"];
                  $cmpItemCount++;
              }
          }
      ?>



      <div class="row clearfix f-space20"></div>
      <div class="box-content">
        <div class="box-products">

          <!-- Products Row -->
          <div class="row box-product">

              <!-- Product-->
              <?php

              $totalRatings = 0;
              if($cmpItemCount == 2) {
                  $sql = "SELECT articleId,price,articleName,picture1,discount FROM article where articleId=$cmpItem1 OR articleId=$cmpItem2";
              }
              else {
                  $sql = "SELECT articleId,price,articleName,picture1,discount FROM article where articleId=$cmpItem1 OR articleId=$cmpItem2 OR articleId=$cmpItem3";
              }
              $result=mysqli_query($connection,$sql);
              $slideCount = 0;
              while($table_record = mysqli_fetch_array($result)) {
                  $articleName = $table_record['articleName'];
                  $articleId = $table_record['articleId'];
                  $price = $table_record['price'];
                  $picture1 = $table_record['picture1'];
                  $discount = $table_record['discount'];
                  $discountedPrice = ($price * $discount) / 100;
                  $discountedPrice = $price - $discountedPrice;

                  $query3 = "select (select count(rating) from ratings where articleId = '$articleId') as totalRating, SUM(rating) as sumRating from ratings where articleId = '$articleId'";

                  $result3 = mysqli_query($connection, $query3);
                  //$slideCount++;
                  $table_record3 = mysqli_fetch_array($result3);
                  $totalRatings = $table_record3['totalRating'];
                  $ratingSum = $table_record3['sumRating'];
                  if ($totalRatings != 0 || $ratingSum != 0) {
                      $avgRating = $ratingSum / $totalRatings;
                  } else {
                      $avgRating = 5;
                  }
                  ?>
                  <!-- Product -->
                  <?php if($cmpItemCount == 2){?>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <?php
                  }
                  else {
                  ?>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <?php } ?>
                      <div class="product-block-nt">
                          <div class="image">
                              <div class="product-label product-sale"><span>SALE</span></div>
                              <a class="img"
                                 href="product.php?articleId=<?php echo $articleId;?>"><img
                                      alt="product info"
                                      src="images/products/<?php echo $picture1?>"
                                      title="product title"></a>
                          </div>

                          <div class="product-meta">

                              <a href="product.php?articleId=<?php echo $articleId;?>"><span class="name"><?= $articleName;?></span></a>
                              <div class="row clearfix f-space20"></div>
                              <table class="compItemTable">
                                  <tr>
                                      <td>Article Id</td>
                                      <td><?= $articleId;?></td>
                                  </tr>

                                  <tr>
                                      <td>Price</td>
                                      <td><span class="price-new">Rs. <?php echo $discountedPrice;?></span> <span>&nbsp &nbsp</span> <small><strike>Rs. <?php echo $price;?></strike></small></td>
                                  </tr>

                                  <tr>
                                      <td>Specs</td>
                                      <td></td>
                                  </tr>

                                  <tr>
                                      <td>Available Colors</td>
                                      <td>
                                          <div class="colorSelect" style="background-color: lightblue;"></div>
                                          <div class="colorSelect" style="background-color: black;"></div>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>Rating</td>
                                      <td>
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
                                          <div class=""><?php
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
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>Total reviews</td>
                                      <td><?=$totalRatings?></td>
                                  </tr>
                              </table>


                              <?php if ($check !== false) { //check if user is logged in or not?>
                                  <div class="big-btns"><a
                                          class="btn btn-default btn-view pull-left"
                                          href="product.php?articleId=<?php echo $articleId; ?>">View</a>
                                      <a class="btn btn-default btn-addtocart pull-right"
                                         onclick="addtocart(<?php echo $articleId ?>)" href="#">BUY
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

                              <div class="small-btns">
                                  <button class="btn btn-default btn-wishlist pull-left"
                                          data-toggle="tooltip" title="Add to Wishlist"><i
                                          class="fa fa-heart fa-fw"></i></button>
                                  <button class="btn btn-default btn-addtocart pull-left"
                                          data-toggle="tooltip" title="Add to Cart"><i
                                          class="fa fa-shopping-cart fa-fw"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- end: Product -->
                  <?php
                  }// end while loop
                  ?>
          </div>
          <!-- end: Products Row -->
        </div>
      </div>

      <?php
      }
      else {

      ?>

      <div class="box-heading category-heading"><span>Showing <?php echo $start_from+1?>-<?php if(($start_from+1)==$total_records)echo $total_records; else if($start_from+$per_page>=$total_records)echo $total_records ;else echo $start_from+$per_page ?> of <?php echo $total_records?> products</span>
        <ul class="nav nav-pills pull-right">
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> <?php if(isset($_GET['perPage'])) {echo $_GET['perPage'];} else echo '12'?> per page <i class="fa fa-sort fa-fw"></i> </a>
            <ul class="dropdown-menu" role="menu">
              <li><a onclick="perPage('12')">12 per page</a></li>
              <li><a onclick="perPage('15')">15 per page</a></li>
              <li><a onclick="perPage('18')">18 per page</a></li>
              <li><a onclick="perPage('21')">21 per page</a></li>
              <li><a onclick="perPage('100')">100 per page</a></li>
              <li><a onclick="perPage('all')">Show all</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a"> Sort by <i class="fa fa-sort fa-fw"></i> </a>
            <ul class="dropdown-menu" role="menu">
              <li ><a onclick="sortBy('l_price')">Price (Low-High)</a></li>
              <li><a onclick="sortBy('h_price')">Price (High-Low)</a></li>
              <li><a onclick="sortBy('rating')">Rating</a></li>
              <li><a onclick="sortBy('recent')">Recent</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="row clearfix f-space20"></div>
      <div class="box-content">
        <div class="box-products">

          <!-- Products Row -->
          <div class="row box-product">

              <!-- Product-->
              <?php

              if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET["minPrice"]) && isset($_GET["maxPrice"]))
              {
                  if(isset($_GET["color"]) && $color != 'null')
                  {
                      $sql = "SELECT a.articleId, a.price, a.articleName, a.picture1, a.discount FROM article as a INNER JOIN color as c ON a.articleId = c.articleId WHERE a.price <= '$maxPrice' AND a.price >= '$minPrice' AND c.color = '$color' ORDER BY $orderBy $orderByValue LIMIT $start_from, $per_page";
                  }
                  else
                  {
                      $sql = "SELECT articleId,price,articleName,picture1,discount FROM article where price <= '$maxPrice' AND price >= '$minPrice' ORDER BY $orderBy $orderByValue LIMIT $start_from, $per_page";
                  }
              }
              else
              {
                  $sql = "SELECT articleId,price,articleName,picture1,discount FROM article ORDER BY $orderBy $orderByValue LIMIT $start_from, $per_page";
              }

              $result=mysqli_query($connection,$sql);
              $slideCount = 0;
              while($table_record = mysqli_fetch_array($result)) {
                  $articleName = $table_record['articleName'];
                  $articleId = $table_record['articleId'];
                  $price = $table_record['price'];
                  $picture1 = $table_record['picture1'];
                  $discount = $table_record['discount'];
                  $discountedPrice = ($price * $discount) / 100;
                  $discountedPrice = $price - $discountedPrice;


                  $query3 = "select (select count(rating) from ratings where articleId = '$articleId') as totalRating, SUM(rating) as sumRating from ratings where articleId = '$articleId'";

                  $result3 = mysqli_query($connection, $query3);
                  //$slideCount++;
                  $table_record3 = mysqli_fetch_array($result3);
                  $totalRatings = $table_record3['totalRating'];
                  $ratingSum = $table_record3['sumRating'];
                  if ($totalRatings != 0 || $ratingSum != 0) {
                      $avgRating = $ratingSum / $totalRatings;
                  } else {
                      $avgRating = 5;
                  }
                  ?>
                  <!-- Product -->
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="product-block">
                          <div class="image">
                              <div class="product-label product-sale"><span>SALE</span></div>
                              <a class="img"
                                 href="product.php?articleId=<?php echo $articleId;?>"><img
                                      alt="product info"
                                      src="images/products/<?php echo $picture1?>"
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
                                         onclick="addtocart(<?php echo $articleId ?>)" href="#">BUY
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
                                                                class="sym">Rs.</span><?php echo $price;?></span></div>
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
                                  <button class="btn btn-default btn-compare pull-left" onclick="addToCompare(<?=$articleId?>, '<?=$articleName?>')"
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
              <?php
              }// end while loop
              ?>
          </div>
          <!-- end: Products Row -->
        </div>
      </div>

      <div class="clearfix f-space30"></div>
      <span class="pull-left"> <?php echo $start_from+1?>-<?php if(($start_from+1)==$total_records)echo $total_records; else if($start_from+$per_page>=$total_records)echo $total_records ;else echo $start_from+$per_page ?> of <?php echo $total_records?>
</span>
      <div class="pull-right">
        <ul class="pagination pagination-lg">
            <?php //echo " <li><a href='category_v1.php?category=".$catforpage."&Brand=".$brandNameValue."&searchQuery=".$search1."&page=1'>&laquo;</a></li> ";
            $currentPage = 1;
            if(isset($_GET['page']))
            {
                $currentPage = $_GET['page'];
            }
            echo " <li><a href='category-grid.php?page=1'>&laquo;</a></li> ";

            for (; $i<=$total_pages; $i++) { ?>
                <li <?php if ($i == $currentPage) {echo "class='active'";}?>>
                    <a onclick="pageNo(<?=$i?>)"><?=$i?></a>
                </li>
            <?php
            }
            // Going to last page
            echo "<li><a href='category-grid.php?page=$total_pages'>&raquo;</a></li>";
            ?>
        </ul>
      </div>

      <?php }
      ?> <!--End else condition-->

    </div>

    <!-- side bar -->
    <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
      <div class="box-heading" id="shopby"><span>Shop by</span></div>
      <!-- Filter by -->
      <div class="box-content" id="shopbyHeading">
        <div class="shopby"> <span>Color</span>
            <div class="colors">
                <?php
                    $getColorQuery = "SELECT * FROM color GROUP BY color";
                    $result = mysqli_query($connection, $getColorQuery);

                    while($row = mysqli_fetch_array($result))
                    {
                        $colors = $row["color"];
                        echo "<a data-toggle='tooltip' title='$colors' onclick='selectedColor(<?=$colors?>)' class='color bg-$colors'></a>";

                    }

                ?>

            </div>
            <hr>

          <!-- Price Range -->
          <span>Price range</span>
          <div class="pricerange">
            <input type="text" id="price-range" name="price-range"
                   data-from="<?php if(isset($_GET['minPrice'])){echo $_GET['minPrice'];} else echo '10';?>"
                   data-to="<?php if(isset($_GET['maxPrice'])){echo $_GET['maxPrice'];} else echo '100000';?>"
                   data-type="double" data-step="100" data-hasgrid="true"
                   data-hideminmax="true" data-hidefromto="true" data-prettify="false"
            />

            <button class="btn color1 normal" onclick="clearShopBy()">Clear</button>
            <button class="btn color1 normal pull-right" onclick="shopBy()">Search</button>
          </div>
          <!--end: Price Range -->
        </div>
      </div>
      <!-- end: Filter by -->

    <!-- Not showing shopBy sidebar while comparing items -->
    <?php
    if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET["compItem1"]) && isset($_GET["compItem2"])) { ?>
        <script >
            document . getElementById("shopby") . style . display = 'none';
            document . getElementById("shopbyHeading") . style . display = 'none';
        </script >

        <div class="clearfix f-space30" style="margin-top: 20px"></div>
    <?php }
    else { ?>
      <div class="clearfix f-space30"></div>
    <?php } ?>

      <div class="box-heading"><span>Categories</span></div>
      <!-- Categories -->
      <div class="box-content">
        <div class="panel-group" id="blogcategories">
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseOne" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Men Wear </a><span class="categorycount">14</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="collapseOne">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseTwo" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Women Wear </a> <span class="categorycount">10</span></h4>
            </div>
            <div class="panel-collapse collapse" id="collapseTwo">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseThree" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Fragrance </a> <span class="categorycount">23</span></h4>
            </div>
            <div class="panel-collapse collapse" id="collapseThree">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseFour" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Music </a><span class="categorycount">06</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="collapseFour">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapseFive" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> Games </a><span class="categorycount">80</span> </h4>
            </div>
            <div class="panel-collapse collapse" id="collapseFive">
              <div class="panel-body">
                <ul>
                  <li class="item"> <a href="#a">Jeans</a></li>
                  <li class="item"> <a href="#a">Shirts</a></li>
                  <li class="item"> <a href="#a">Shoes</a></li>
                  <li class="item"> <a href="#a">Sports Wear</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end: Blog Categories -->

      <div class="clearfix f-space30"></div>
      <div class="box-heading"><span>Compare</span></div>
      <!-- Compare -->
      <div class="box-content">
        <div class="compare" id="compareList">
            <?php
                $item1 = "No Item Selected";
                $item2 = "No Item Selected";
                $item3 = "No Item Selected";
                $itemName = ["No Item Selected", "No Item Selected", "No Item Selected"];

                $query = "SELECT * FROM comparelist WHERE userId = $userId";
                $result = mysqli_query($connection, $query);
                if($result)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {

                        if($row['item1']) { $item1 = $row['item1']; $counter++;}
                        if($row['item2']) {  $item2 = $row['item2']; $counter++;}
                        if($row['item3']) { $item3 = $row['item3']; $counter++;}
                    }
                    echo "<p id='hiddenCmpListCounter' hidden>$counter</p>";

                }

                for($i=0; $i<3; $i++)
                {
                    $item = [$item1, $item2, $item3];
                    $query1 = "SELECT articleName FROM article WHERE articleId = $item[$i]";
                    $result1 = mysqli_query($connection, $query1);
                    if($result1) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            if ($row1['articleName']) {
                                $itemName[$i] = $row1['articleName'];
                            }
                        }
                    }
                }

            ?>
            <span>
                <a href="product.php"><i hidden id="firstComp"><?=$item1?></i> <i id="firstCompName"><?=$itemName[0]?></i></a>
                <!--<a href="#" class="pull-right"><i class="fa fa-times fa-fw"></i></a>-->
            </span>
            <span>
                <a href="product.php"><i hidden id="secComp"><?=$item2?></i> <i id="secCompName"><?=$itemName[1]?></i></a>
            </span>
            <span>
                <a href="product.php"><i hidden id="thirdComp"><?=$item3?></i> <i id="thirdCompName"><?=$itemName[2]?></i></a>
            </span>

            <button class="btn color1 normal" onclick="clearCompare()">Clear</button>
            <button class="btn color1 normal pull-right" onclick="compareBtnPress()">Compare</button>
        </div>

        <!-- Compare -->
      </div>
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
    <!-- end:sidebar -->
  </div>
  <!-- end:row -->
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>
<!-- footer -->
<?php include "footer.php";?>
<!-- end: footer -->

<!--My Javascript-->
<script>
    var currentURL = window.location.href;
    var count = 0;
    count = document.getElementById("hiddenCmpListCounter").innerHTML;



    function clearCompare() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('firstComp').innerHTML = "No Item Selected";
                document.getElementById('secComp').innerHTML = "No Item Selected";
                document.getElementById('thirdComp').innerHTML = "No Item Selected";
                document.getElementById('firstCompName').innerHTML = "No Item Selected";
                document.getElementById('secCompName').innerHTML = "No Item Selected";
                document.getElementById('thirdCompName').innerHTML = "No Item Selected";
            }
        }
        xmlhttp.open("GET", "addToCompareList.php?articleId=" + '-1' , true);
        xmlhttp.send();

        count = 0;
    }

    function addToCompare(id, name) {



        if(count == 0 && id != document.getElementById('secComp').innerHTML && id != document.getElementById('thirdComp').innerHTML)
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('firstComp').innerHTML = id;
                    document.getElementById('firstCompName').innerHTML = name;
                }
            }
            xmlhttp.open("GET", "addToCompareList.php?articleId=" + id , true);
            xmlhttp.send();

            count++;
        }
        else if(count == 1 && id != document.getElementById('firstComp').innerHTML && id != document.getElementById('thirdComp').innerHTML)
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('secComp').innerHTML = id;
                    document.getElementById('secCompName').innerHTML = name;
                }
            }
            xmlhttp.open("GET", "addToCompareList.php?articleId=" + id , true);
            xmlhttp.send();

            count++;
        }
        else if(count == 2 && id != document.getElementById('firstComp').innerHTML && id != document.getElementById('secComp').innerHTML)
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('thirdComp').innerHTML = id;
                    document.getElementById('thirdCompName').innerHTML = name;
                }
            }
            xmlhttp.open("GET", "addToCompareList.php?articleId=" + id , true);
            xmlhttp.send();

            count++;
        }

        else if(count > 2)
        {
            alert("No more than 3 items can be compared simultaneously!");
        }

        else if(id == document.getElementById('firstComp').innerHTML || id == document.getElementById('secComp').innerHTML || id == document.getElementById('thirdComp').innerHTML)
        {
            alert("Item already in compare list!");
        }
    }

    function compareBtnPress() {
        var firstComp = document.getElementById("firstComp").innerHTML;
        var secComp = document.getElementById("secComp").innerHTML;
        var thirdComp = document.getElementById("thirdComp").innerHTML;

        if(firstComp != "No Item Selected" && secComp != "No Item Selected")
        {
            window.location = "category-grid.php?compItem1=" +firstComp+ "&compItem2=" +secComp+ "&compItem3=" +thirdComp;
        }
        else
        {
            alert("Please select atleast 2 items to compare");
        }
    }

    var color = null;
    function shopBy()
    {
        var x = document.getElementById("price-range").value.split(';');
        var minPrice = x[0];
        var maxPrice = x[1];

        if(currentURL.search('minPrice=') == -1) {
            if(currentURL.search('[?]') == -1) {
                window.location = currentURL + "?minPrice=" + minPrice + "&maxPrice=" + maxPrice + "&color=" + color;
            }
            else {
                window.location = currentURL + "&minPrice=" + minPrice + "&maxPrice=" + maxPrice + "&color=" + color;
            }
        }
        else {
            var shopByRegex = /minPrice[=][0-9]+[&]maxPrice[=][0-9]+[&]color[=][a-z]+/;
            var results = shopByRegex.exec( currentURL );
            if( results != null )
            {
                currentURL = currentURL.replace(shopByRegex, "minPrice=" + minPrice + "&maxPrice=" + maxPrice + "&color=" + color);
                window.location.href = currentURL;
            }
            else alert("Not Found!");
        }
    }

    function clearShopBy()
    {
        window.location = "category-grid.php";
    }

    function selectedColor(id)
    {
        color = id;
    }

    function sortBy(type) {
        if (currentURL.search('sortBy=') == -1) {
            if (currentURL.search('[?]') == -1) {
                window.location = currentURL + "?sortBy=" + type;
            }
            else {
                window.location = currentURL + "&sortBy=" + type;
            }
        }
        else {
            var sortByRegex = /sortBy[=][a-z|_]+/;
            var results = sortByRegex.exec( currentURL );
            if( results != null )
            {
                currentURL = currentURL.replace(sortByRegex, "sortBy=" + type);
                window.location.href = currentURL;
            }
            else alert("Not Found!");
        }
    }

    function perPage(items)
    {
        if(currentURL.search('perPage=') == -1) {
            if(currentURL.search('[?]') == -1) {
                window.location = currentURL + "?perPage=" + items;
            }
            else {
                window.location = currentURL + "&perPage=" + items;
            }
        }
        else {
            var perPageRegex = /perPage[=][0-9]+/;
            var results = perPageRegex.exec( currentURL );
            if( results != null )
            {
                currentURL = currentURL.replace(perPageRegex, "perPage=" + items);
                window.location.href = currentURL;
            }
            else alert("Not Found!");
        }
    }

    function pageNo(x)
    {
        if(currentURL.search('page=') == -1) {
            if(currentURL.search('[?]') == -1) {
                window.location = currentURL + "?page=" + x;
            }
            else {
                window.location = currentURL + "&page=" + x;
            }
        }
        else {
            var pageRegex = /page[=][0-9]+/;
            var results = pageRegex.exec( currentURL );
            if( results != null )
            {
                currentURL = currentURL.replace(pageRegex, "page=" + x);
                window.location.href = currentURL;
            }
            else alert("Not Found!");
        }
    }
</script>

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


			//Filter by Price Slider
$("#price-range").ionRangeSlider({
    min: 10,                        // min value
    max: 100000,                       // max valuec
    type: "double",                 // slider type
    step: 50,                       // slider step
    postfix: "",             		// postfix text
    hasGrid: false,                  // enable grid
    hideMinMax: false,               // hide Min and Max fields
    hideFromTo: false,               // hide From and To fields
    prettify: false,                 // separate large numbers with space, eg. 10 000
    onChange: function(obj){        // function-callback, is called on every change
        console.log(obj);
    },
    onFinish: function(obj){        // function-callback, is called once, after slider finished it's work
        console.log(obj);
    }
});



})(jQuery);

 </script>

</body>
</html>