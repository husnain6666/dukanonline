<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 menu-col">
            <div class="menu-heading <?php
            $url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
            if($url !== "/index.php" && $url !== "http://localhost:63342/dukanonline/" && $url !== "www.storeonline.pk" && $url !== "http://www.storeonline.pk")
                echo "menuHeadingdropdown";
            ?>" <span> <i class="fa fa-bars"></i> Categories</span> </div>
<!-- Mega Menu -->
<div class="menu3dmega vertical <?php
if($url !== "/index.php" && $url !== "storeonline.pk" && $url !== "www.storeonline.pk" && $url !== "http://www.storeonline.pk")
    echo "menuMegasub";
            ?>" id="menuMega">
                <ul>
                    <!-- Menu Item Links for Mobiles Only -->
                    <li class="visible-xs"> <a href="index.html"> <i class="fa fa-home"></i> <span>Home</span> <i class="fa fa-angle-right"></i> </a>
                        <div class="dropdown-menu flyout-menu">
                            <!-- Sub Menu -->
                            <ul>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li> <a href="#a"><span>Account</span> <i class="fa fa-caret-right"></i> </a>
                                    <ul class="dropdown-menu sub flyout-menu">
                                        <li><a href="#a">Login/Register</a></li>
                                        <li><a href="#a">My Orders</a></li>
                                        <li><a href="#a">Wish list</a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                    </ul>
                                </li>
                                <li> <a href="#a"><span>Product</span> <i class="fa fa-caret-right"></i> </a>
                                    <ul class="dropdown-menu sub flyout-menu">
                                        <li><a href="category-grid.html">Category Grid</a></li>
                                        <li><a href="category-list.html">Category List</a></li>
                                        <li><a href="product.php">Product Page</a> </li>
                                    </ul>
                                </li>
                                <li><a href="cart.html">Shoping Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="blog-single.html">Blog Post</a></li>
                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                            <!-- end: Sub Menu -->
                        </div>
                    </li>
                    <!-- end: Menu Item -->
                    <!-- Menu Item for Tablets and Computers Only-->
                    <li class="hidden-xs"> <a href="#a"> <i class="fa fa-files-o"></i> <span>Pages</span> <i class="fa fa-angle-right"></i> </a>
                        <div class="dropdown-menu flyout-menu">
                            <!-- Sub Menu -->
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-single.html">Blog Post</a></li>
                                <li> <a href="#a"><span>Product</span> <i class="fa fa-caret-right"></i> </a>
                                    <ul class="dropdown-menu sub flyout-menu">
                                        <li><a href="category-grid.html">Category Grid</a></li>
                                        <li><a href="category-list.html">Category List</a></li>
                                        <li><a href="product.php">Product Page</a> </li>
                                    </ul>
                                </li>
                                <li><a href="cart.html">Shoping Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                            <!-- end: Sub Menu -->
                        </div>
                    </li>
                    <!-- end: Menu Item -->
                    <!-- Menu Item -->
                    <li> <a href="#a"> <i class="fa fa-male"></i> <span>Men Wear</span> <i class="fa fa-angle-right"></i> </a>
                        <div class="dropdown-menu">
                            <!-- Sub Menu -->
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-4"> <a class="menu-title" href="#a">Fashion</a>
                                        <ul>
                                            <li><a href="#a">Clothing</a></li>
                                            <li><a href="#a">Shoes</a></li>
                                            <li><a href="#a">Handbags</a></li>
                                            <li><a href="#a">Accessories</a></li>
                                            <li><a href="#a">Luggage</a></li>
                                            <li><a href="#a">Jewelry</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4"> <a class="menu-title" href="#a">Shirts</a>
                                        <ul>
                                            <li><a href="#a">Reguler Shirts</a></li>
                                            <li><a href="#a">Slim Shirts</a></li>
                                            <li><a href="#a">Fashion Shirts</a></li>
                                            <li><a href="#a">Black Shirts</a></li>
                                            <li><a href="#a">White Shirts</a></li>
                                            <li><a href="#a">Gray Shirts</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4"> <a class="menu-title" href="#a">Jeans</a>
                                        <ul>
                                            <li><a href="#a">Reguler Jeans</a></li>
                                            <li><a href="#a">Slim-fit Jeans</a></li>
                                            <li><a href="#a">Loose Jeans</a></li>
                                            <li><a href="#a">Top Jeans</a></li>
                                            <li><a href="#a">New Jeans</a></li>
                                            <li><a href="#a">Color Jeans</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p> <a href="#a"><img alt="" src="images/menu-ad.jpg"></a> </p>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Sub Menu -->
                        </div>
                    </li>
                    <!-- end: Menu Item -->
                    <!-- Menu Item -->
                    <li> <a href="#a"> <i class="fa fa-female"></i> <span>Women Wear</span> <i class="fa fa-angle-right"></i> </a>
                        <div class="dropdown-menu">
                            <!-- Sub Menu -->
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-5"> <a class="menu-title" href="#a">Fashion</a>
                                        <ul>
                                            <li><a href="#a">Clothing</a></li>
                                            <li><a href="#a">Shoes</a></li>
                                            <li><a href="#a">Handbags</a></li>
                                            <li><a href="#a">Accessories</a></li>
                                            <li><a href="#a">Luggage</a></li>
                                            <li><a href="#a">Jewelry</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="product-block">
                                            <div class="image">
                                                <div class="product-label product-sale"><span>SALE</span></div>
                                                <a class="img" href="product.php"><img alt="product info" src="images/products/product1.jpg" title="product title"></a> </div>
                                            <div class="product-meta">
                                                <div class="name"><a href="product.php">Ladies Stylish Handbag</a></div>
                                                <div class="big-price"> <span class="price-new"><span class="sym">$</span>96</span> <span class="price-old"><span class="sym">$</span>119.50</span> </div>
                                                <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="#">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to
                                                        Cart</a> </div>
                                                <div class="small-price"> <span class="price-new"><span class="sym">$</span>96</span> <span class="price-old"><span class="sym">$</span>119.50</span> </div>
                                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
                                                <div class="small-btns">
                                                    <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                    <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>
                                                    <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Add to Cart"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                                                </div>
                                            </div>
                                            <div class="meta-back"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Sub Menu -->
                        </div>
                    </li>
                    <!-- end: Menu Item -->
                    <!-- Menu Item -->
                    <li> <a href="#a"> <i class="fa fa-video-camera"></i> <span>Digital Camera</span></a> </li>
                    <!-- end: Menu Item -->
                    <!-- Menu Item -->
                    <li> <a href="#a"> <i class="fa fa-mobile"></i> <span>Mobile Phones</span></a> </li>
                    <!-- end: Menu Item -->
                    <!-- Menu Item -->
                    <li> <a href="#a"> <i class="fa fa-laptop"></i> <span>Computers</span></a> </li>
                    <!-- end: Menu Item -->
                    <!-- Menu Item -->
                    <li> <a href="#a"> <i class="fa fa-gamepad"></i> <span>Gaming</span></a> </li>
                    <!-- end: Menu Item -->
                    <!-- Menu Item -->
                    <li> <a href="#a"> <i class="fa fa-gift"></i> <span>Gift Ideas</span></a> </li>
                    <!-- end: Menu Item -->
                </ul>
            </div>
            <!-- end: Mega Menu -->
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 menu-col-2">
            <!-- Navigation Buttons/Quick Cart for Tablets and Desktop Only -->
            <div class="menu-links hidden-xs">
                <ul class="nav nav-pills nav-justified">
                    <li> <a href="index.html"> <i class="fa fa-home fa-fw"></i> <span class="hidden-sm">Home</span></a> </li>
                    <li> <a href="about.html"> <i class="fa fa-info-circle fa-fw"></i> <span class="hidden-sm">About</span></a> </li>
                    <li> <a href="blog.html"> <i class="icons"><span><img src="images/icons/jug.png" width="14" height="18"></span></i> <span class="hidden-sm">Appliances</span></a> </li>
                    <li> <a href="contact.php"> <i class="fa"><img src="images/icons/kitchen.png" width="19" height="18"></i> <span class="hidden-sm ">Kitchen</span></a> </li>
                    <li class="dropdown"> <a href="cart.html"> <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-sm"> 5 items | $4530.00</span></a>
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
