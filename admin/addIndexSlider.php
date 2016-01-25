<?php
include_once('dbConnect.php');
include_once('session.php');
?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Add/Update Slider</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <?php include "header.php";?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include "sideBar.php";?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Slider
                <small>New Sliders</small>
            </h1>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    if(isset($_GET['message']))
                    {
                        ?>

                        <div class="panel panel-success" id="idalert">
                            <div class="panel-heading"><?php echo $_GET['message'];?></div>
                        </div>
                        <script>setTimeout(function() {
                                $('#idalert').fadeOut('fast');
                            }, 2000);</script>
                    <?php
                    }
                    ?>
                    <div id="myModal" class="modal fade modal-default" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete User</h4>
                                </div>
                                <div class="modal-body">
                                    <p id="user" name="user"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
                                    <button onclick="userAction(userName,1)" id="yes" data-toggle='modal' data-target='#successModal' type="button" class="btn btn-danger" data-dismiss="modal">YES</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="resetModal" class="modal fade modal-default" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Reset Password</h4>
                                </div>
                                <div class="modal-body">
                                    <p id="user-reset" name="user-reset"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
                                    <button onclick="userAction(userName,2)" id="yes-reset" data-toggle='modal' data-target='#successModal' type="button" class="btn btn-danger" data-dismiss="modal">YES</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="successModal" class="modal fade modal-success" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Success</h4>
                                </div>
                                <div class="modal-body">
                                    <h4>Action Successful&nbsp;<i class="glyphicon glyphicon-ok"></i></h4>
                                </div>
                            </div>

                        </div>
                    </div>



                    <!-- Horizontal Form -->

                    <!-- Horizontal Form -->
                    <div class="box box-info" id="form" >
                        <div class="box-header with-border">
                            <h3 class="box-title">Add your Slider here</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form action="insertSlider.php" class="form-horizontal"  method="Post" enctype=multipart/form-data>
                            <div class=" box-body" >

                                <div class=" form-group">
                                    <label for="qty" class="col-sm-2 control-label" align="left">Choose Picture</label>

                                    <div class="col-sm-offset-2">
                                        <input type="file" name="image" accept="image/jpeg"/>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button class="btn btn-info pull-right">Submit</button>
                            </div><!-- /.box-footer -->

                        </form>
                    </div>
                    <br/>
                    <div class="box box-info" id="form" >
                        <div class="box-header with-border">
                            <h3 class="box-title">View/Update your Sliders here</h3>
                        </div><!-- /.box-header -->

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="col-md-1">ID</th>
                                    <th class="col-md-2">Picture</th>
                                    <th class="col-md-3"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT * FROM slider";
                                $result = mysqli_query($CONNECTION, $query);
                                if ($result) {
                                    if ($result->num_rows > 0) {
                                        while ($add = mysqli_fetch_assoc($result)) {

                                            echo "<tr>" .
                                                "<td class='col-md-4'> {$add['sliderId']} </td>" .
                                                "<td class='col-md-5'> <img src='../{$add['picture']}' width='170px' height='100px' border='1'  /> </td>" .
                                                "<td align='center' class='col-md-3'>" .
                                                "<a  href='../index.php' target='_blank'><button  class='btn btn-primary btn-xs' data-toggle='modal' data-target='' title='' onclick=''><i class='fa fa-eye'></i></button></a>&nbsp;<a href='updateSlider.php?Id={$add['sliderId']}' target='_blank'><button class='btn btn-success btn-xs' data-toggle='modal' data-target='' title='' onclick='newtab(this)' data-original-title='Reset Password'><i class='fa fa-refresh'></i></button>&nbsp;<a  href='removeRecords.php?query=slider&id={$add['sliderId']}' target=''><button  class='btn btn-danger btn-xs' data-toggle='modal' data-target='' title='' onclick=''><i class='fa fa-minus'></i></button></a>" .
                                                "</td>" .
                                                "</tr>";
                                        }
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                            <br/>
                            <br/>
                        </div>

                    </div>

                </div><!-- /.col -->
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->


    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
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

<link href="plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />

<script>
    function addlink()
    {
        var link = document.getElementById("linkArea");
        link.value += " <a style=color:#000000 href=YOUR_PAGE_LINK.php?articleId=YOUR_ARTICLE_ID>View</a>";
    }
</script>

<!-- page script -->

</body>
</html>