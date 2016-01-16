<div class="container">
    <div class="row clearfix">
        <div class="col-lg-3 col-xs-12">
            <div class="logo"> <a href="index.php" title="Flatro Template"><!-- <img alt="Flatro - Responsive Metro Inspired Flat ECommerce theme" src="images/logo2.png"> -->
                    <div class="logoimage"><i class="fa fa-shopping-cart fa-fw"></i></div>
                    <div class="logotext"><span><strong>FLATRO</strong></span><span>SHOP</span></div>
                    <span class="slogan">ONLINE STORE</span></a> </div>
        </div>
        <!-- end: logo -->
        <div class="visible-xs f-space20"></div>
        <!-- search -->
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right">
            <div class="searchbar">
                <form action="#">
                    <ul class="pull-left">
                        <li class="input-prepend dropdown" data-select="true"> <a class="add-on dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <span class="dropdown-display">All
                Categories</span> <i class="fa fa-sort fa-fw"></i> </a>
                            <!-- this hidden field is used to contain the selected option from the dropdown -->
                            <input class="dropdown-field" type="hidden" value="All Categories"/>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                include_once("connectdb.php");
                                $query = "SELECT * FROM mastercategory";
                                $result = mysqli_query($connection, $query);
                                if($result)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $masterCategory = $row['masterCategory'];
                                        echo "<li><a href='category-grid.php?category=$masterCategory' data-value='$masterCategory'>$masterCategory</a></li>";
                                    }
                                }
                                ?>
                                <li><a href="#a" data-value="All Categories">All Categories</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="searchbox pull-left">
                        <input class="searchinput" id="search" placeholder="Search..." type="search">
                        <button class="fa fa-search fa-fw" type="submit"></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end: search -->

    </div>
</div>