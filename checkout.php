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









<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <h2>Checkout <span>(6 Steps)</span></h2>
            </div>
        </div>
    </div>
</div>
<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container">
<!-- row -->
<div class="row">
<div class="col-md-9 col-sm-12 col-xs-12 main-column box-block">

<!-- Checkout Options -->
<div class="box-content checkout-op">
<div class="panel-group" id="checkout-options">

<!-- login and register panel -->
<div class="panel panel-default">
    <div class="panel-heading opened" data-parent="#checkout-options" data-target="#op1" data-toggle="collapse">
        <h4 class="panel-title"> <a href="#a"> <span class="fa fa-cogs"></span> CHECKOUT OPTIONS </h4>
    </div>
    <!--
    <div class="panel-collapse collapse in" id="op1">
        <div class="panel-body">
            <div class="row co-row">

                <div class="col-md-6 col-xs-12">
                    <div class="box-content login-box">
                        <h4>Customers with a registered account.</h4>
                        <form>
                            <input type="text" value="" placeholder="Email/Username" class="input4">
                            <input type="text" value="" placeholder="Password" class="input4">
                            <label class="checkbox" for="checkbox1">
                                <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox" class="pull-left">
                                <span class="pull-left">Remember me</span> </label>
                            <button class="btn medium color2 pull-right">Sign in</button>
                            <p class="fp-link pull-right"><a href="#a" class="color2">Forgot your password?</a></p>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="box-content register-box">
                        <h4>Not registered yet?</h4>
                        <p>Register with us for future convenience:</p>
                        <ul>
                            <li><i class="fa fa-check fa-fw"></i> Fast and easy check out.</li>
                            <li><i class="fa fa-check fa-fw"></i> Easy access to your order history and status.</li>
                            <li><i class="fa fa-check fa-fw"></i> Earn Shopping points while you shop using your account. </li>
                            <li><i class="fa fa-check fa-fw"></i> Save card Information and Addresses. Never fill a form again.</li>
                        </ul>
                        <form>
                            <button class="btn medium color2 pull-right">Register</button>
                            <p class="fp-link pull-right"><a href="#a" class="color2">Continue as guest</a></p>
                        </form>
                    </div>
                </div>


            </div>
        </div>-->

</div>

<!-- end: login and register panel -->

<!-- Billing Address panel -->
<!--

<div class="panel panel-default">
    <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op2" data-toggle="collapse">
        <h4 class="panel-title"> <a href="#a"> <span class="fa fa-map-marker"></span> BILLING ADDRESS </a><span class="op-number">01</span> </h4>
    </div>
    <div class="panel-collapse collapse" id="op2">
        <div class="panel-body">
            <div class="row co-row">
                <form>
                    <div class="col-md-6 col-xs-12">
                        <div class="box-content form-box">
                            <h4>Your Personal Details</h4>
                            <input type="text" value="" name="firstname" placeholder="First Name*" class="input4">
                            <input type="text" value="" name="lastname" placeholder="Last Name*" class="input4">
                            <input type="text" value="" name="email" placeholder="Email*" class="input4">
                            <input type="text" value="" name="phone" placeholder="Phone*" class="input4">
                            <input type="text" value="" name="fax" placeholder="Fax" class="input4">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="box-content form-box">
                            <h4>Your Address</h4>
                            <input type="text" value="" name="company" placeholder="Company" class="input4">
                            <input type="text" value="" name="address1" placeholder="Address line 1*" class="input4">
                            <input type="text" value="" name="address2" placeholder="Address line 2" class="input4">
                            <input type="text" value="" name="city" placeholder="City*" class="input4">
                            <input type="text" value="" name="postcode" placeholder="Post Code" class="input4">
                            <input type="text" value="" name="state" placeholder="State*" class="input4">
                            <input type="text" value="" name="country" placeholder="Country*" class="input4">
                            <button class="btn medium color2 pull-right">Continue</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- end: Billing Address panel -->

<!--Shipping Address panel -->

<div class="panel panel-default">
    <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op3" data-toggle="collapse">
        <h4 class="panel-title"> <a href="#a"> <span class="fa fa-envelope-o"></span> SHIPPING ADDRESS </a><span class="op-number">01</span> </h4>
    </div>
    <div class="panel-collapse collapse" id="op3">
        <div class="panel-body">
            <div class="row co-row">
                <form>
                    <!--
                    <div class="col-md-6 col-xs-12">
                        <div class="box-content form-box">
                            <h4>Your Personal Details</h4>
                            <input type="text" value="" name="firstname" placeholder="First Name*" class="input4">
                            <input type="text" value="" name="lastname" placeholder="Last Name*" class="input4">
                            <input type="text" value="" name="email" placeholder="Email*" class="input4">
                            <input type="text" value="" name="phone" placeholder="Phone*" class="input4">
                            <input type="text" value="" name="fax" placeholder="Fax" class="input4">
                            <button class="btn medium color3 pull-right">Same as Billing Address</button>
                        </div>
                    </div>
                    <!-- end: Login -->
                    <!-- Register -->

                    <div class="col-md-12 col-xs-12">
                        <div class="box-content form-box">
                            <h4>Where you want your order to be delivered!</h4>
                            <input type="text" name="addressship" placeholder="Enter Address *"  class="form-control input4" id="nameship" onblur="validation_billing_shipping()" onkeyup="validation_billing_shipping()" required="">
                            <input type="text" name="Emailship" placeholder="Email *" class="form-control input4" id="Emailship" onblur="validation_billing_shipping()" onkeyup="validation_billing_shipping()" required="">
                            <input type="text" name="Cityship" placeholder="City *" class="form-control input4" id="City" onblur="validation_billing_shipping()" onchange="validation_billing_shipping()" onkeyup="validation_billing_shipping()" required="">
                            <input type="text" name="Countryship" placeholder="Country *" class="form-control input4" id="Country" onblur="validation_billing_shipping()" onchange="validation_billing_shipping()" onkeyup="validation_billing_shipping()" required="">
                            <input type="text" name="contactship" placeholder="Contact *" class="form-control input4" id="contact" onblur="validation_billing_shipping()" onchange="validation_billing_shipping()" onkeyup="validation_billing_shipping()" required="">

                            <button class="btn medium color2 pull-right">Continue</button>
                        </div>
                    </div>
                </form>
                <!-- end: Register -->

            </div>
        </div>
    </div>
</div>

<!-- end: Shipping Address panel -->

<!--Shipping Method -->

<div class="panel panel-default"> <!-- add class disabled to prevent from clicking -->
    <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op4" data-toggle="collapse">
        <h4 class="panel-title"> <a href="#a"> <span class="fa fa-truck"></span> SHIPPING METHOD </a><span class="op-number">03</span> </h4>
    </div>
    <div class="panel-collapse collapse" id="op4">
        <div class="panel-body">
            <div class="row co-row">

                <!-- Shipping methods -->
                <div class="col-md-12 col-xs-12">
                    <div class="box-content form-box">
                        <h4>Please select the preferred shipping method to use on this order.</h4>
                        <label class="radio" for="radio1">
                            <input type="radio" value="" id="radio1" data-toggle="radio"  name="shippingmethod" checked="checked" class="pull-left">
                            <span class="pull-left color1 provider">Standard International Postage</span> - <span class="color2 price">Free</span><br/>
                            <em>Delivered to your letterbox within <br/>
                                7-14 working days</em> </label>
                        <label class="radio" for="radio2">
                            <input type="radio" value="" id="radio2" data-toggle="radio"  name="shippingmethod" class="pull-left">
                            <span class="pull-left color1 provider">DHL Standard Postage</span> - <span class="color2 price">$2.99</span><br/>
                            <em>Delivered to your letterbox within <br/>
                                2-5 working days</em> </label>
                        <label class="radio" for="radio3">
                            <input type="radio" value="" id="radio3" data-toggle="radio" name="shippingmethod" class="pull-left">
                            <span class="pull-left color1 provider">FEDEX QUICK DELIVERY</span> - <span class="color2 price">$6.40</span><br/>
                            <em>Delivered to your letterbox within <br/>
                                1-3 working days</em> </label>
                        <button class="btn medium color2 pull-right">Continue</button>
                    </div>
                </div>
                <!-- end: Shipping methods -->

            </div>
        </div>
    </div>
</div>

<!-- end: Shipping Method -->

<!-- Payment Method -->

<div class="panel panel-default"> <!-- add class disabled to prevent from clicking -->
    <div class="panel-heading closed" data-parent="#checkout-options" data-target="#op5" data-toggle="collapse">
        <h4 class="panel-title"> <a href="#a"> <span class="fa fa-money"></span> PAYMENT METHOD </a><span class="op-number">04</span> </h4>
    </div>
    <div class="panel-collapse collapse" id="op5">
        <div class="panel-body">
            <div class="row co-row">

                <!-- Payment methods -->
                <div class="col-md-12 col-xs-12">
                    <div class="box-content form-box">
                        <h4>Please select the preferred Payment method to use on this order.</h4>
                        <label class="radio" for="radio4">
                            <input type="radio" value="" id="radio4" data-toggle="radio"  name="paymentmethod" class="pull-left">
                            <span class="pull-left color1 provider">Direct Bank Transfer</span><br/>
                            <em>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</em> </label>
                        <label class="radio" for="radio5">
                            <input type="radio" value="" id="radio5" data-toggle="radio"  name="paymentmethod" checked="checked" class="pull-left">
                            <span class="pull-left color1 provider">Monybookers</span><br/>
                            <em>Moneybookers(Skrill) makes it easy for developers to accept credit cards on the web.</em> </label>
                        <label class="radio" for="radio6">
                            <input type="radio" value="" id="radio6" data-toggle="radio"  name="paymentmethod" class="pull-left">
                            <span class="pull-left color1 provider">Paypal</span><br/>
                            <em>Appropriately seize value-added quality vectors via fully researched process improvements. </em> </label>
                        <textarea name="comments" id="comments" cols="10" rows="8" class="input4" placeholder="Comments/messsage"></textarea>
                        <button class="btn medium color2 pull-right">Continue</button>
                    </div>
                </div>
                <!-- end: Payment methods -->

            </div>
        </div>
    </div>
</div>

<!-- end: Payment Method -->

<!-- Confirm Order -->

<div class="panel panel-default"> <!-- add class disabled to prevent from clicking -->
<div class="panel-heading closed" data-parent="#checkout-options" data-target="#op6" data-toggle="collapse">
    <h4 class="panel-title"> <a href="#a"> <span class="fa fa-check"></span> Confirm Order </a><span class="op-number">05</span> </h4>
</div>
<div class="panel-collapse collapse" id="op6">
<div class="panel-body">
<div class="row co-row">
<div class="col-md-12 col-xs-12">
<div class="box-content form-box">
<h4>Please confirm your order.</h4>

<!-- product -->

<div class="row">
    <div class="product">
        <div class="col-md-2 col-sm-3 hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="image"> <a class="img" href="product.php"><img alt="product info" src="images/products/product3.jpg" title="product title"></a> </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
            <div class="product-attrb-wr">
                <div class="product-meta">
                    <div class="name">
                        <h3><a href="product.php">Ladies Stylish Handbag</a></h3>
                    </div>
                    <div class="price"> <span class="price-new"><span class="sym">$</span>96</span> <span class="price-old"><span class="sym">$</span>119.50</span> </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="att"> <span>Color:</span> <a href="#a" data-toggle="tooltip" title="" class="color bg-red" data-original-title="Red"></a> </div>
                    <div class="att"> <span>Size:</span> <span class="size">XS</span> </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="qtyinput">
                        <div class="quantity-inp">
                            <input type="text" class="quantity-input" name="p_quantity" value="1">
                            <div class="quantity-txt minusbtn"><a href="#a" class="qty qtyminus" ><i class="fa fa-minus fa-fw"></i></a></div>
                            <div class="quantity-txt plusbtn"><a href="#a" class="qty qtyplus" ><i class="fa fa-plus fa-fw"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="price"> <span class="t-price"><span class="sym">$</span>1296</span> </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="remove"> <a href="#a" class="color2" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o fa-fw color2"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end: product -->

<!-- product -->

<div class="row">
    <div class="product">
        <div class="col-md-2 col-sm-3 hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="image"> <a class="img" href="product.php"><img alt="product info" src="images/products/product1.jpg" title="product title"></a> </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
            <div class="product-attrb-wr">
                <div class="product-meta">
                    <div class="name">
                        <h3><a href="product.php">Ladies Stylish Handbag</a></h3>
                    </div>
                    <div class="price"> <span class="price-new"><span class="sym">$</span>96</span> <span class="price-old"><span class="sym">$</span>119.50</span> </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="att"> <span>Color:</span> <a href="#a" data-toggle="tooltip" title="" class="color bg-gray" data-original-title="Gray"></a> </div>
                    <div class="att"> <span>Size:</span> <span class="size">XS</span> </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="qtyinput">
                        <div class="quantity-inp">
                            <input type="text" class="quantity-input" name="p_quantity" value="1">
                            <div class="quantity-txt minusbtn"><a href="#a" class="qty qtyminus"><i class="fa fa-minus fa-fw"></i></a></div>
                            <div class="quantity-txt plusbtn"><a href="#a" class="qty qtyplus"><i class="fa fa-plus fa-fw"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="price"> <span class="t-price"><span class="sym">$</span>1296</span> </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="remove"> <a href="#a" class="color2" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o fa-fw color2"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end: product -->

<!-- product -->

<div class="row">
    <div class="product">
        <div class="col-md-2 col-sm-3 hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="image"> <a class="img" href="product.php"><img alt="product info" src="images/products/product2.jpg" title="product title"></a> </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
            <div class="product-attrb-wr">
                <div class="product-meta">
                    <div class="name">
                        <h3><a href="product.php">Ladies Stylish Handbag</a></h3>
                    </div>
                    <div class="price"> <span class="price-new"><span class="sym">$</span>96</span> <span class="price-old"><span class="sym">$</span>119.50</span> </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="att"> <span>Color:</span> <a href="#a" data-toggle="tooltip" title="" class="color bg-teal" data-original-title="Teal"></a> </div>
                    <div class="att"> <span>Size:</span> <span class="size">XS</span> </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="qtyinput">
                        <div class="quantity-inp">
                            <input type="text" class="quantity-input" name="p_quantity" value="1">
                            <div class="quantity-txt minusbtn"><a href="#a" class="qty qtyminus" ><i class="fa fa-minus fa-fw"></i></a></div>
                            <div class="quantity-txt plusbtn"><a href="#a" class="qty qtyplus" ><i class="fa fa-plus fa-fw"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="price"> <span class="t-price"><span class="sym">$</span>1296</span> </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
            <div class="product-attrb-wr">
                <div class="product-attrb">
                    <div class="remove"> <a href="#a" class="color2" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o fa-fw color2"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end: product -->

<div class="box-content cart-box-wr pull-right">
    <div class="cart-box-tm">
        <div class="tm1">Sub-Total</div>
        <div class="tm2">$2167.25</div>
    </div>
    <div class="cart-box-tm">
        <div class="tm1">Eco Tax (-2.00) </div>
        <div class="tm2">$23.60</div>
    </div>
    <div class="cart-box-tm">
        <div class="tm1">VAT (18.2%) </div>
        <div class="tm2">$54.00</div>
    </div>
    <div class="cart-box-tm">
        <div class="tm3 bgcolor2">Total </div>
        <div class="tm4 bgcolor2">$7854.34</div>
    </div>
</div>
<div class="clearfix f-space20"></div>
<!--  <textarea name="comments" id="comments" cols="5" rows="5" class="input4" placeholder="Comments/messsage"></textarea> -->

<button class="btn large color1 pull-right">Create Order</button>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- end: Confirm Order -->

</div>
</div>
<!-- end: Checkout Options -->

</div>
<!-- side bar -->
<div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
    <div class="box-heading"><span>Summary</span></div>
    <!-- Cart Summary -->
    <div class="box-content cart-box-wr">
        <div class="cart-box-tm">
            <div class="tm1">Sub-Total</div>
            <div class="tm2">$2167.25</div>
        </div>
        <div class="cart-box-tm">
            <div class="tm1">Eco Tax (-2.00) </div>
            <div class="tm2">$23.60</div>
        </div>
        <div class="cart-box-tm">
            <div class="tm1">VAT (18.2%) </div>
            <div class="tm2">$54.00</div>
        </div>
        <div class="cart-box-tm">
            <div class="tm3 bgcolor2">Total </div>
            <div class="tm4 bgcolor2">$7854.34</div>
        </div>
    </div>

    <!-- end: Cart Summary -->

    <div class="clearfix f-space30"></div>
    <div class="box-heading"><span>Best Sellers</span></div>
    <!-- Best Sellers Products -->
    <div class="box-content">
        <div class="box-products slide carousel-fade" id="productc4">
            <ol class="carousel-indicators">
                <li class="active" data-slide-to="0" data-target="#productc4"></li>
                <li class="" data-slide-to="1" data-target="#productc4"></li>
                <li class="" data-slide-to="2" data-target="#productc4"></li>
            </ol>
            <div class="carousel-inner">
                <!-- item -->
                <div class="item active">
                    <div class="product-block">
                        <div class="image">
                            <div class="product-label product-hot"><span>HOT</span></div>
                            <a class="img" href="product.php"><img alt="product info" src="images/products/product1.jpg" title="product title"></a> </div>
                        <div class="product-meta">
                            <div class="name"><a href="product.php">Ladies Stylish Handbag</a></div>
                            <div class="big-price"> <span class="price-new"><span class="sym">$</span>96</span> </div>
                            <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="#">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to
                                    Cart</a> </div>
                        </div>
                        <div class="meta-back"></div>
                    </div>
                </div>
                <!-- end: item -->
                <!-- item -->
                <div class="item">
                    <div class="product-block">
                        <div class="image"> <a class="img" href="product.php"><img alt="product info" src="images/products/product2.jpg" title="product title"></a> </div>
                        <div class="product-meta">
                            <div class="name"><a href="product.php">Ladies Stylish Handbag</a></div>
                            <div class="big-price"> <span class="price-new"><span class="sym">$</span>654.87</span> </div>
                            <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="#">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to
                                    Cart</a> </div>
                        </div>
                        <div class="meta-back"></div>
                    </div>
                </div>
                <!-- end: item -->
                <!-- item -->
                <div class="item">
                    <div class="product-block">
                        <div class="image"> <a class="img" href="product.php"><img alt="product info" src="images/products/product3.jpg" title="product title"></a> </div>
                        <div class="product-meta">
                            <div class="name"><a href="product.php">Ladies Stylish Handbag</a></div>
                            <div class="big-price"> <span class="price-new"><span class="sym">$</span>1600</span> </div>
                            <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="#">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to
                                    Cart</a> </div>
                        </div>
                        <div class="meta-back"></div>
                    </div>
                </div>
                <!-- end: item -->
            </div>
        </div>
        <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc4"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc4"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
        <div class="nav-bg"></div>
    </div>
    <!-- end: Best Sellers Products -->
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
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-12 shopinfo">
                <h4 class="title">FLATSHOP</h4>
                <p> This Efficiently negotiate robust communities with extensible systems.
                    Appropriately productize top-line leadership skills rather than team
                    building applications.</p>
                <p> Phosfluorescently extend highly efficient schemas with intermandated. </p>
            </div>
            <div class="col-sm-3 col-xs-12 footermenu">
                <h4 class="title">Information</h4>
                <ul>
                    <li class="item"> <a href="#a">Delivery Info</a></li>
                    <li class="item"> <a href="#a">FAQs</a></li>
                    <li class="item"> <a href="#a">Payment Instructions</a></li>
                    <li class="item"> <a href="#a">Request Product</a></li>
                    <li class="item"> <a href="#a">Vendor Registration</a></li>
                    <li class="item"> <a href="#a">Affiliates</a></li>
                    <li class="item"> <a href="#a">Gift Vouchers</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-12 footermenu">
                <h4 class="title">My
                    account</h4>
                <ul>
                    <li class="item"> <a href="#a">My Account</a></li>
                    <li class="item"> <a href="#a">Order History</a></li>
                    <li class="item"> <a href="#a">Wish List</a></li>
                    <li class="item"> <a href="#a">Newsletter</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-12 getintouch">
                <h4 class="title">get in
                    touch</h4>
                <ul>
                    <li>
                        <div class="icon"> <i class="fa fa-map-marker fa-fw"></i> </div>
                        <div class="c-info"> <span>3rd Avenue, NY, US<br>
              <a href="#a">Find us on map</a></span> </div>
                    </li>
                    <li>
                        <div class="icon"> <i class="fa fa-envelope-o fa-fw"></i> </div>
                        <div class="c-info"> <span>Email Us At:<br>
              <a href="#a">support@domain.com</a></span> </div>
                    </li>
                    <li>
                        <div class="icon"> <i class="fa fa-phone fa-fw"></i> </div>
                        <div class="c-info"> <span>24/7 Phone Support:<br>
              <a href="#a">+1 (888) 888 8888</a></span> </div>
                    </li>
                    <li>
                        <div class="icon"> <i class="fa fa-skype fa-fw"></i> </div>
                        <div class="c-info"> <span>Talk to Us:<br>
              <a href="#a">skypeid</a></span> </div>
                    </li>
                </ul>
                <div class="social-icons">
                    <ul>
                        <li class="icon google-plus"> <a href="#a"> <i class="fa fa-google-plus fa-fw"></i> </a> </li>
                        <li class="icon linkedin"> <a href="#a"> <i class="fa fa-linkedin fa-fw"></i> </a> </li>
                        <li class="icon twitter"> <a href="#a"> <i class="fa fa-twitter fa-fw"></i> </a> </li>
                        <li class="icon facebook"> <a href="#a"> <i class="fa fa-facebook fa-fw"></i> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-xs-12"> <span class="copytxt">&copy; Copyright 2013 by <a href="#a">Flatro</a> - All rights reserved</span> <span class="btmlinks"><a href="#a">Return Policy</a> | <a href="#a">Privacy Policy</a> | <a href="#a">Terms of Use</a></span> </div>
                <div class="col-lg-4 col-sm-4 col-xs-12 payment-icons"> <a href="#a"> <img alt="discover" src="images/icons/discover.png"> </a> <a href="#a"> <img alt="2co" src="images/icons/2co.png"> </a> <a href="#a"> <img alt="paypal" src="images/icons/paypal.png"> </a> <a href="#a"> <img alt="master card" src="images/icons/mastercard.png"> </a> <a href="#a"> <img alt="visa card" src="images/icons/visa.png"> </a> <a href="#a"> <img alt="moneybookers" src="images/icons/moneybookers.png"> </a> </div>
            </div>
        </div>
    </div>
</footer>
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
        //Mega Menu
        $('#menuMega').menu3d();

        //Help/Contact Number/Quick Message
        $('.quickbox').carousel({
            interval: 10000
        });

    })(jQuery);

</script>
</body>
</html>