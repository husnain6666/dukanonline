<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/adminlogo1.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="<?php if($_SERVER['REQUEST_URI'] == "/dukanonline/admin/data.php")
                echo "active ";?>treeview">
                <a href="data.php">
                    <i class="fa fa-user"></i> <span>Customer</span> <i class=""></i>
                </a>
            </li>
            <li class="<?php if($_SERVER['REQUEST_URI'] == "/dukanonline/admin/orders.php")
                echo "active ";?>treeview">
                <a href="orders.php">
                    <i class="fa fa-book"></i> <span>Orders</span> <i class=""></i>
                </a>
            </li>
            <li class="<?php if($_SERVER['REQUEST_URI'] == "/dukanonline/admin/addArticle.php" || $_SERVER['REQUEST_URI'] == "/dukanonline/admin/articles.php" )
                echo "active ";?>treeview">
                <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-star"></i><span> Articles </span><i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo2" class="collapse">

                    <li>
                        <a href="addArticle.php">
                            <i class="fa fa-plus"></i> <span>Add New Article</span> <i class=""></i>
                        </a>
                    </li>
                    <li>
                        <a href="articles.php">
                            <i class="fa fa-star"></i> <span>View Articles</span> <i class=""></i>
                        </a>
                    </li>

                </ul>
            </li>

            </li>
            <li class="<?php if($_SERVER['REQUEST_URI'] == "/dukanonline/admin/addBrand.php")
                            echo "active ";?> treeview">
                <a href="addBrand.php">
                    <i class="fa fa-apple"></i> <span>Add Brand Name</span> <i class=""></i>
                </a>
            </li>
            </li>
            <li class="<?php if($_SERVER['REQUEST_URI'] == "/dukanonline/admin/addCategory.php")
                echo "active ";?>treeview">
                <a href="addCategory.php">
                    <i class="fa fa-plus"></i> <span>Add Category Name</span> <i class=""></i>
                </a>
            </li>
            <li class="<?php if($_SERVER['REQUEST_URI'] == "/dukanonline/admin/addPoster.php" || $_SERVER['REQUEST_URI'] == "/dukanonline/admin/posters.php")
                echo "active ";?>treeview">
                <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-file"></i> <span>Posters</span><i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo3" class="collapse">
                    <li>
                        <a href="addPoster.php">
                            <i class="fa fa-plus"></i> <span>Add Poster</span> <i class=""></i>
                        </a>
                    </li>
                    <li>
                        <a href="posters.php">
                            <i class="fa fa-file-text"></i> <span>View Posters</span> <i class=""></i>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="<?php if($_SERVER['REQUEST_URI'] == "/dukanonline/admin/phpMail.php")
                echo "active ";?>treeview">
                <a href="phpMail.php">
                    <i class="fa fa-mail-forward"></i> <span>Send Newsletter</span> <i class=""></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>