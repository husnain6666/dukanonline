<style type="text/css" xmlns="http://www.w3.org/1999/html">
    #idalert {
        visibility: hidden;
        margin-bottom: 0;
    }
</style>
<script type="text/javascript">
    function formatTextArea(textArea) {
        textArea.value = textArea.value.replace(/(^|\r\n|\n)([^\u21D2  ]|$)/g, "$1\u21D2  $2");
    }

    window.onload = function () {
        var textArea = document.getElementById("todolist");
        textArea.onkeyup = function (evt) {
            evt = evt || window.event;

            if (evt.keyCode == 13) {
                formatTextArea(this);
            }
        };
    };

</script>
<?php
include_once('session.php');
$pic1="";
$pic11="";
$pass= randomPassword();
$active ="";
$picture1="#";
$path = "../images/services/";

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
if (!empty($_GET['q'])) {
    include("dbConnect.php");
    $q = $_GET['q'];
    $query = "SELECT  * from services WHERE  title='$q'";
    $result = mysqli_query($CONNECTION, $query);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($notify = mysqli_fetch_assoc($result)) {

                $title = $notify['title'];
                $picture1 = $path.$notify['pic'];
                $active = $notify['active'];
                $specification = $notify['specification'];
                $active = '';
                if ($notify['active']) {
                    $active = 'checked="checked"';
                }
            }
        }
    }
}
$valid_formats = array("jpeg", "jpg", "png", "gif", "bmp","JPEG", "JPG", "PNG", "GIF", "BMP");

if (isset($_POST['submit1'])) {

    if (empty($_POST["title"])) {
        $errors['article_name'] = "Please Fill This Field!";

    } else {
        $title = $_POST["title"];
        $article_name = $_POST["title"];
    }
    if (empty($_POST["specification"]))
    {
        $errors['specification'] = "Please Fill This Field!";

    } else
    {
        $description3 = $_POST["specification"];
    }
    $active =0;


    if (isset($_POST['active'])) {
        $active = 1;
    }
    $art_name = $_POST['title'];
    $name = $_FILES['pic1']['name'];
    $size = $_FILES['pic1']['size'];
if($name!="") {
    if (strlen($name)) {
        list($txt, $ext) = explode(".", $name);
        if (in_array($ext, $valid_formats)) {
            $pic1 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
            $pic11 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
            $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
            $tmp = $_FILES['pic1']['tmp_name'];
            if (move_uploaded_file($tmp, $path .$actual_image_name)) {
                if(file_exists ( $path.$actual_image_name ))
                {
                    rename($path.$actual_image_name,$path.$pic1);

                    if (file_exists($picture1)) {
                        unlink($picture1);
                    }
                }

        } else
            $errors['pic1'] = "Invalid File Format";
    } else
        $errors['pic1'] = "Please Select Image File";

}
}
    $p1="";
    if($pic1!=""){
        $p1=",pic='".$pic1."'";;
    }else{
        $p1="";
    }


    if (empty($error)) {
        //  $sql = "UPDATE `article` SET `articleName`='$article_name' ,`Category`='$category' ,`brand`='$bN' ,`specification`='$description' ,`weekDeal`='$hotdeal',bestSeller='$bestsale' ,Sale='$sale',`price`='$ppp' ,`quantity`='$quantity',`discount`='$tp'  ,`date`='$date' ,`color`='$color' $p1 $p2 $p3  WHERE articleId='$ar_id'";
        $sql = "UPDATE `services` SET `title`='$title',active='$active' ,`specification`='$description3' $p1  WHERE title='$q'";

        $result = mysqli_query($CONNECTION, $sql);
?><style type="text/css" xmlns="http://www.w3.org/1999/html">
            #idalert {
                visibility:visible;
                margin-bottom: 0;
            }
        </style>

        <div class="panel panel-success " style="background: green" id="idalert">
            <div class="panel-heading">Acttion Succuss</div>
        </div>
        <script>setTimeout(function() {
                $('#idalert').fadeOut('fast');
            }, 2000);
            setTimeout(function() {
                ;
            }, 2000)

            window.location = "addServices.php";

        </script>
         <?php




    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <script>
        function userAction(user, action) {
            // window.alert(user);
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("userData").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "userAction.php?q=" + user + "&a=" + action, true);
            xmlhttp.send();
        }
    </script>
    <meta charset="UTF-8">
    <title>Update Services</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- DATA TABLES -->
    <link href="plu gins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

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
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">

                        <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <?php
                            include("dbConnect.php");
                            $count = 0;
                            $query = "SELECT * FROM `notifications` Where status='Unread'";
                            $result = mysqli_query($CONNECTION, $query);
                            if ($result) {
                                if ($result->num_rows > 0) {
                                    while ($notify = mysqli_fetch_assoc($result)) {
                                        $count++;

                                    }
                                }
                            }
                            echo "<span class='label label-danger'>$count</span>";
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php
                                    include("dbConnect.php");
                                    $query = "SELECT * FROM `notifications` GROUP BY trackingId ORDER BY notificationDate DESC";
                                    $result = mysqli_query($CONNECTION, $query);
                                    if ($result) {
                                        if ($result->num_rows > 0) {
                                            while ($notify = mysqli_fetch_assoc($result)) {
                                                if ($notify['status'] == "Unread") {
                                                    echo "<li><a href='vieworders.php?a={$notify['trackingId']}' style='background-color:#939393'><h3>"
                                                        . "<font size='2px'color='white' >New order  <font size='3px' color='white'><i><strong>&nbsp{$notify['trackingId']}&nbsp</strong></i></font>  has been placed</font><small class='pull-right'><font size='2.5px' color='green'>{$notify['status']}</font></small>"
                                                        . "</h3></a></li>";

                                                } else if ($notify['status'] == "Read") {
                                                    echo "<li><a href='vieworders.php?a={$notify['trackingId']}' style='background-color:#'><h3>"
                                                        . "<font size='2px'>New order  <font size='3px' color='black'><i><strong>&nbsp{$notify['trackingId']}&nbsp</strong></i></font>  has been placed</font><small class='pull-right'><font size='2.5px' color='green'>{$notify['status']}</font></small>"
                                                        . "</h3></a></li>";

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
                            <img src="dist/img/adminlogo1.png" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/adminlogo1.png" class="img-circle" alt="User Image"/>

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
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/adminlogo1.png" class="img-circle" alt="User Image"/>
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

                <li class="treeview">
                    <a href="data.php">
                        <i class="fa fa-dashboard"></i> <span>Customer</span> <i class=""></i>
                    </a>
                </li>
                <li class="treeview">
                    <a href="orders.php">
                        <i class="fa fa-dashboard"></i> <span>Order</span> <i class=""></i>
                    </a>
                </li>

                <li class="treeview">
                    <a href="addArticle.php">
                        <i class="fa fa-dashboard"></i> <span>Add New Article</span> <i class=""></i>
                    </a>
                </li>
                <li class="treeview">
                    <a href="articles.php">
                        <i class="fa fa-dashboard"></i> <span>Article</span> <i class=""></i>
                    </a>
                </li>
                </li>
                <li class="treeview">
                    <a href="addBrand.php">
                        <i class="fa fa-dashboard"></i> <span>Add Brand Name</span> <i class=""></i>
                    </a>
                </li>
                </li>
                <li class="active treeview">
                    <a href="addCategory.php">
                        <i class="fa fa-dashboard"></i> <span>Add Category Name</span> <i class=""></i>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Update Services
                <small>Update Services</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- Horizontal Form -->
                    <div class="box box-info" id="form">
                                        <div class="box-header with-border">
                            <h3 class="box-title">Update Services Form</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="" id='insertform'
                              enctype="multipart/form-data" method="Post">
                            <div class=" box-body">
                                <div class=" col-md-offset-1 form-group">
                                    <label for="name" class="col-sm-2 control-label">Title*</label>

                                    <p class="help-block text-danger"></p>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="title" name="title" value='<?php echo $q;?>'
                                               placeholder="" required>
                                        <span class="error"><font
                                                color="red"> <?php if (isset($errors['title'])) echo $errors['title']; ?></font></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="specification" class="col-sm-2 control-label">Specification*</label>

                                    <div class="col-sm-9">
                                        <textarea rows="5" cols="5" type="text" WRAP=SOFT class="form-control" id="todolist"
                                                  name="specification" required><?php echo $specification;?></textarea>
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['specification'])) echo $errors['specification']; ?></font></span>
                                    </div>

                                </div>
                                <div class=" form-group">
                                    <label for="qty" class="col-sm-2 control-label" align="left">Choose
                                        Picture1*</label>

                                    <div class="col-sm-offset-2">
                                        <input type="file" class="col-sm-8 control-label" name="pic1" id="pic1" >
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['pic1'])) echo $errors['pic1']; ?></font></span>
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <div class="col-md-offset-3">
                                        <img src='<?php echo $picture1;?>'width="20%" height="20%" border="1" />
                                    </div>
                                    </div>
                                        <div class="form-group">
                                    <label for="small" class="col-sm-3 control-label">Active</label>
                                    <div class="col-sm-1 ">
                                        <input type="checkbox" class=" checkbox" id="active" name="active" <?php echo $active;?>  >
                                    </div>
                            </div>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class='errorabcd' style='display:none'>Event Created</div>
                <div class="box-footer">
                    <button name="submit1"
                    " data-toggle="tooltip" data-original-title='Submits' id="submit1"class="btn btn-info
                    pull-right">Submit</button>
                </div>
                <!-- /.box-footer -->

                </form>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->


    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>

<link href="plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
<!-- page script -->
<script type="text/javascript">

    var id1;
    var userid;
    function newtab(id) {
        userid = $(id).data("original-title");

        // document.getElementById("article_name1").value = userid;
        url = 'updateCategory.php?q=' + userid;
        window.open(url, '_self', false)
    }

    $("submit1").click(function () {
        $("panel").show(1000);
    });
    var userName;
    $(function () {
        $("#example1").DataTable({
            "autoWidth": true,
            "lengthChange": true,
            "lengthMenu": [5, 10, 25, 50, 100]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

    $('#myModal').on('show.bs.modal', function (e) {
        var userId = $(e.relatedTarget).data('user-name');
        userName = $(e.relatedTarget).data('user-id');
        $(e.currentTarget).find('p[name="user"]').html('You are about to delete <strong>' + userId + '</strong>. Are you sure?');
    });

    $('#resetModal').on('show.bs.modal', function (e) {
        var userId = $(e.relatedTarget).data('user-name');
        userName = $(e.relatedTarget).data('user-id');
        $(e.currentTarget).find('p[name="user-reset"]').html('You want to set default password <i>"Honliz@123"</i> for <strong>' + userId + '</strong>?');
    });
</script>
</body>
</html>