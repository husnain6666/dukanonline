<header class="main-header">
    <!-- Logo -->
    <a href="data.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>H</b>L</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>ElectroSh</b>op.pk</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">

                        <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <?php
                            include("dbConnect.php");
                            $count=0;
                            $query ="SELECT * FROM `notifications` Where status='Unread'";
                            $result = mysqli_query($CONNECTION, $query);
                            if($result) {
                                if($result->num_rows > 0) {
                                    while ($notify = mysqli_fetch_assoc($result)) {
                                        $count++;

                                    }
                                }
                            }


                            echo  "<span class='label label-danger'>$count</span>";
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">

                                    <?php
                                    include("dbConnect.php");
                                    $query ="SELECT * FROM `notifications` GROUP BY trackingId ORDER BY notificationDate DESC";
                                    $result = mysqli_query($CONNECTION, $query);
                                    if($result) {
                                        if($result->num_rows > 0) {
                                            while ($notify = mysqli_fetch_assoc($result)) {
                                                if($notify['status']=="Unread"){
                                                    echo "<li><a href='vieworders.php?a={$notify['trackingId']}' style='background-color:#939393'><h3>"
                                                        ."<font size='2px'color='white' >New order  <font size='3px' color='white'><i><strong>&nbsp{$notify['trackingId']}&nbsp</strong></i></font>  has been placed</font><small class='pull-right'><font size='2.5px' color='green'>{$notify['status']}</font></small>"
                                                        ."</h3></a></li>";

                                                }
                                                else if($notify['status']=="Read"){
                                                    echo "<li><a href='vieworders.php?a={$notify['trackingId']}' style='background-color:#'><h3>"
                                                        ."<font size='2px'>New order  <font size='3px' color='black'><i><strong>&nbsp{$notify['trackingId']}&nbsp</strong></i></font>  has been placed</font><small class='pull-right'><font size='2.5px' color='green'>{$notify['status']}</font></small>"
                                                        ."</h3></a></li>";

                                                }
                                            }
                                        }
                                    }
                                    ?>


                                </ul>
                            </li>
                            <li class="footer">
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/adminlogo1.png" class="user-image" alt="User Image" />
                            <span class="hidden-xs">Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/adminlogo1.png" class="img-circle" alt="User Image" />
                                <p><?php echo $_SESSION['USERNAME']; ?></p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="destroySession.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
        </div>
    </nav>
</header>