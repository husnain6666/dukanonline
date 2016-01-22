<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 menu-col">
    <div class="menu-heading <?php
    if($_SERVER['REQUEST_URI'] !== "/dukanonline/index.php")
        echo "menuHeadingdropdown";
    ?>" <span> <i class="fa fa-bars"></i> Categories</span> </div>
<!-- Mega Menu -->
<div class="menu3dmega vertical <?php
if($_SERVER['REQUEST_URI'] !== "/dukanonline/index.php")
    echo "menuMegasub";
?>" id="menuMega">
        <ul>
            <!-- Menu Item Links for Mobiles Only -->
            <li class="visible-xs"> <a href="index.php"> <i class="fa fa-cube"></i> <span>Home</span> <i class="fa fa-angle-right"></i> </a>
                <div class="dropdown-menu flyout-menu">
                    <!-- Sub Menu -->
                    <ul>
                        <li><a href="about.php">About us</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li> <a href="#a"><span>Account</span> <i class="fa fa-caret-right"></i> </a>
                            <ul class="dropdown-menu sub flyout-menu">
                                <li><a href="#a">Login/Register</a></li>
                                <li><a href="#a">My Orders</a></li>
                                <li><a href="#a">Wish list</a></li>
                                <li><a href="cart.php">Shopping Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                            </ul>
                        </li>
                        <li> <a href="#a"><span>Product</span> <i class="fa fa-caret-right"></i> </a>
                            <ul class="dropdown-menu sub flyout-menu">
                                <li><a href="category-grid.php">Category Grid</a></li>
                                <li><a href="category-list.php">Category List</a></li>
                                <li><a href="product.php">Product Page</a> </li>
                            </ul>
                        </li>
                        <li><a href="cart.php">Shoping Cart</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="blog-single.php">Blog Post</a></li>
                        <li><a href="contact.php">Contact us</a></li>
                    </ul>
                    <!-- end: Sub Menu -->
                </div>
            </li>
            <!-- end: Menu Item -->


            <!--#################################Adding dynamic categories############################################-->
            <!-- Menu Item for Tablets and Computers Only-->
            <?php
            include("connectdb.php");
            $arrow_count = 0;
            $totalMasterCategory = 0;
            $totalSubCategory = 0;
            $totalSubSubCategory = 0;
            $subsubCatItemCount = 0;
            $iterationCounter = 0;
            $query0 = "SELECT COUNT(masterCategory) as totalMasterCategory FROM mastercategory WHERE status = '1'";
            $result0 = mysqli_query($connection, $query0);
            if($result0)
            {
                while($row0 = mysqli_fetch_assoc($result0))
                {
                    $totalMasterCategory = $row0['totalMasterCategory'];
                }
            }
            $query1 = "SELECT * FROM mastercategory WHERE status = '1' LIMIT 8";
            $result1 = mysqli_query($connection, $query1);
            if($result1)
            {
            while($row1 = mysqli_fetch_assoc($result1))
            {
            $masterCategory = $row1['masterCategory'];
            $masterCatPic = $row1['pic'];
            $picLogo = $row1['piclogo'];
            ?>

            <li class="hidden-xs">
                <a href="category-grid.php?category=<?=$masterCategory?>"> <i class="<?php echo $picLogo; ?>"></i> <span><?=$masterCategory?></span> <i class="fa fa-angle-right"></i> </a>
                <div class="dropdown-menu flyout-menu">
                    <!-- Sub Menu -->
                    <ul>
                        <?php
                        $query2 = "SELECT count(subcategory.subCategory) as totalSubCategory FROM subcategory INNER JOIN masterrsub ON subcategory.subCategory = masterrsub.subCategory INNER JOIN masterCategory ON mastercategory.masterCategory = masterrsub.masterCategory WHERE masterrsub.masterCategory = '$masterCategory' AND subcategory.status = '1'";
                        $result2 = mysqli_query($connection, $query2);
                        if($result2)
                        {
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                                $totalSubCategory = $row2['totalSubCategory'];
                            }
                        }
                        $query3 = "SELECT subcategory.subCategory FROM subcategory INNER JOIN masterrsub ON subcategory.subCategory = masterrsub.subCategory INNER JOIN masterCategory ON mastercategory.masterCategory = masterrsub.masterCategory WHERE masterrsub.masterCategory = '$masterCategory' AND subcategory.status = '1' LIMIT 8";
                        $result3 = mysqli_query($connection, $query3);
                        if($result3)
                        {
                        while($row3 = mysqli_fetch_assoc($result3))
                        {
                        $subCategory = $row3['subCategory'];
                        $arrow_sign = 'arrow_sign'.$arrow_count;
                        ?>
                        <li> <a href="category-grid.php?subCategory=<?=$subCategory?>"><span><?=$subCategory?></span> <span id="<?=$arrow_sign?>" hidden><i class="fa fa-caret-right" style="margin-top: -20px"></i></span> </a>


                            <?php
                            $query4 = "SELECT count(category.categoryName) as totalSubSubCategory FROM category INNER JOIN subbcategory ON category.categoryName = subbcategory.categoryName INNER JOIN subcategory ON subbcategory.subCategory = subcategory.subCategory WHERE subcategory.subCategory = '$subCategory' AND category.status = '1'";
                            $result4 = mysqli_query($connection, $query4);
                            if($result4)
                            {
                                while($row4 = mysqli_fetch_assoc($result4))
                                {
                                    $totalSubSubCategory = $row4["totalSubSubCategory"];
                                }
                            }
                            $countsub = 0;
                            $query5 = "SELECT category.categoryName FROM category INNER JOIN subbcategory ON category.categoryName = subbcategory.categoryName INNER JOIN subcategory ON subbcategory.subCategory = subcategory.subCategory WHERE subcategory.subCategory = '$subCategory' AND category.status = '1' LIMIT 21";
                            $result5 = mysqli_query($connection, $query5);
                            if($result5)
                            {
                            while($row5 = mysqli_fetch_assoc($result5))
                            {
                            $categoryName = $row5['categoryName'];
                            if($totalSubSubCategory < 8)
                            {
                            if($countsub == 0)
                            {
                                echo "<ul class='dropdown-menu sub flyout-menu'>";
                            }
                            $countsub++;
                            ?>
                        <li><a href='category-grid.php?subsubCategory=<?= $categoryName ?>'><?= $categoryName ?></a></li>
                        <?php
                        if($countsub == $totalSubSubCategory)
                        {
                            echo "</ul>";
                            $countsub = 0;
                        }
                        ?>
                        <?php
                        }
                        else
                        {
                        if($subsubCatItemCount == 0)
                        {?>
                        <ul class="dropdown-menu sub">
                            <!-- Sub Menu -->
                            <div class="content">
                                <div class="row">
                                    <?php
                                    $subsubCatItemCount++;
                                    }
                                    if($totalSubSubCategory < 15)
                                    {?>
                                        <style>
                                        </style>
                                        <?php
                                        if( $iterationCounter == 0 || $iterationCounter == 7 )
                                        {?>
                                            <div class="col-md-4">
                                            <ul>
                                        <?php
                                        }?>
                                        <li><a href="category-grid.php?searchQuery="><?php if(strlen($categoryName)>20){echo substr("$categoryName", 0, 20)."...";} else echo $categoryName?></a></li>
                                        <?php
                                        if( $iterationCounter == 6 || $iterationCounter == 13 )
                                        {?>
                                            </ul>
                                            </div>
                                        <?php
                                        }
                                        $iterationCounter++;
                                    }
                                    if($totalSubSubCategory < 22 && $totalSubSubCategory > 14)
                                    {
                                        if( $iterationCounter == 0 || $iterationCounter == 7 ||$iterationCounter == 14 )
                                        {?>
                                            <div class="col-md-4">
                                            <ul>
                                        <?php
                                        }?>
                                        <li><a href="category-grid.php?searchQuery="><?php if(strlen($categoryName)>20){echo substr("$categoryName", 0, 20)."...";} else echo $categoryName?></a></li>
                                        <?php
                                        if( $iterationCounter == 6 || $iterationCounter == 13 )
                                        {?>
                                            </ul>
                                            </div>
                                        <?php
                                        }
                                        $iterationCounter++;
                                    }
                                    ?>

                                    <?php if($iterationCounter == $totalSubSubCategory)
                                    {?>
                        </ul>
                </div>
    </div>
</div>
</ul>
<?php
}
}?>
<script>
    document.getElementById("<?=$arrow_sign?>").style.display = 'block';
</script>
<?php }
}
?>
</li>
<?php
$arrow_count++;
}
} ?>

</ul>
<!-- end: Sub Menu -->
</div>
</li>
<?php
} //end of while loop
} //end of if condition
?>
<!-- end: Menu Item -->
<!--##############################END: dynamic categories#################################-->
</ul>
</div>
<!-- end: Mega Menu -->
</div>
<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 menu-col-2">
    <!-- Navigation Buttons/Quick Cart for Tablets and Desktop Only -->
    <div class="menu-links hidden-xs">
        <ul class="nav nav-pills nav-justified">
            <li> <a href="index.php"> <i class="fa fa-home fa-fw"></i> <span class="hidden-sm">Home</span></a> </li>
            <li> <a href="about.php"> <i class="fa fa-info-circle fa-fw"></i> <span class="hidden-sm">About</span></a> </li>
            <li> <a href="blog.php"> <i class="fa fa-bullhorn fa-fw"></i> <span class="hidden-sm">Blog</span></a> </li>
            <li> <a href="contact.php"> <i class="fa fa-pencil-square-o fa-fw"></i> <span class="hidden-sm ">Contact</span></a> </li>
            <li class="dropdown"> <a href="cart.php"> <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-sm"> 5 items | $4530.00</span></a>
                <!-- Quick Cart -->
                <div class="dropdown-menu quick-cart">
                    <div class="qc-row qc-row-heading"> <span class="qc-col-qty">QTY.</span> <span class="qc-col-name">5 items in bag</span> <span class="qc-col-price">$4530.00</span> </div>
                    <div class="qc-row qc-row-item"> <span class="qc-col-qty">2</span> <span class="qc-col-name"><a href="#a">Women Fashion hot Wear item</a></span> <span class="qc-col-price">$500</span> <span class="qc-col-remove"> <i class="fa fa-times fa-fw"></i> </span> </div>
                    <div class="qc-row qc-row-item"> <span class="qc-col-qty">1</span> <span class="qc-col-name"><a href="#a">Women Fashion hot Wear item</a></span> <span class="qc-col-price">$800</span> <span class="qc-col-remove"> <i class="fa fa-times fa-fw"></i> </span> </div>
                    <div class="qc-row qc-row-item"> <span class="qc-col-qty">3</span> <span class="qc-col-name"><a href="#a">Women Fashion hot Wear item</a></span> <span class="qc-col-price">$252.25</span> <span class="qc-col-remove"> <i class="fa fa-times fa-fw"></i> </span> </div>
                    <div class="qc-row-bottom"><a class="btn qc-btn-viewcart" href="#a">view
                            cart</a><a class="btn qc-btn-checkout" href="#a">check
                            out</a></div>
                </div>
                <!-- end: Quick Cart -->
            </li>
        </ul>
    </div>
    <!-- end: Navigation Buttons/Quick Cart Tablets and large screens Only -->