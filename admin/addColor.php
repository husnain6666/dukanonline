<?php
include_once('dbConnect.php');
include_once('session.php');
$errors = array();
$pass= randomPassword();



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

if(isset($_POST['submit1']))
{

    echo "<script type='text/javascript'>$('#submit1').click(function(event){event.preventDefault(); }); </script>";

    if (empty($_POST["article_name"])) {
        $errors['article_name']="Please Fill This Field!";
    } else {
        $article_name=$_POST["article_name"];
    }

    if(empty($errors)){
        include_once('dbConnect.php');
        $sql = "INSERT INTO `color`(colorName) VALUES('$article_name')";
        $result = mysqli_query($CONNECTION, $sql);
        echo "<script>alert('Action Successfull');</script>";
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
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("userData").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","userAction.php?q="+user+"&a="+action,true);
            xmlhttp.send();
        }
    </script>
    <meta charset="UTF-8">
    <title>Add Category</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plu gins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
            <li class="treeview">
                <a href="addCategory.php">
                    <i class="fa fa-dashboard"></i> <span>Add Category Name</span> <i class=""></i>
                </a>
            </li>
            <!--  <li class="active treeview">
                <a href="addColor.php">
                    <i class="fa fa-dashboard"></i> <span>Add Color</span> <i class=""></i>
                </a>
            </li>-->



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add  Color
            <small>Add New Color</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">



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
                <div class="box box-info" id="form" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Color Form</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id='insertform' enctype="multipart/form-data"  method="Post">
                        <div class=" box-body" >

                            <div class=" col-md-offset-1 form-group" >
                                <label for="name"    class="col-sm-2 control-label" >Color Name*</label>
                                <p class="help-block text-danger"></p>


                                <div class="col-sm-9">
                                    <input type="text"   class="form-control" id="article_name1" name="article_name" placeholder="" required >
                                    <span class="error"><font color="red"> <?php if(isset($errors['article_name'])) echo $errors['article_name'];?></font></span>
                                </div>
                            </div>

                        </div>
                </div>

            </div><!-- /.box-body -->
            <div class='errorabcd' style='display:none'>Event Created</div>
            <div class="box-footer">
                <button  name="submit1" " data-toggle="tooltip" data-original-title='Submits'  id="submit1"class="btn btn-info pull-right" >Submit</button>
            </div><!-- /.box-footer -->



            </form>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Color Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php

                    $query = "SELECT * FROM color";
                    $result = mysqli_query($CONNECTION, $query);
                    if($result) {
                        if($result->num_rows > 0) {
                            while ($member = mysqli_fetch_assoc($result)) {
                                $category=$member['colorName'];

                                    ?>
                    <tr>

                                    <td> <?php echo $member['colorName'] ?></td>
                                    <td align='center'>
                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="" title="" onclick="newtab(this)"  data-original-title='<?php echo $member['colorName']?>' data-user-id={$member['colorName']}><i class='fa fa-refresh'></i></button>&nbsp<button class="btn btn-success btn-xs" data-toggle="modal" data-target="" title="" onclick="newtab1(this)"  data-original-title='<?php echo $member['colorName']?>' data-user-id={$member['colorName']}><i class="fa fa-remove"></i></button>
                                    </td>

                                    </tr>
                            <?php

                            }
                        }
                    }

                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Color Name</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->



<?php
function f1(){
    echo "<script>alert('Action Successfull');</script>";
}
if(isset($_POST["d"])){
    echo "<script>alert('Action Successfull');</script>";

}
?>




</div><!-- /.col -->
</div><!-- /.row -->
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

<!-- page script -->
<script type="text/javascript">

    var id1;
    var userid;
    function newtab(id){
        userid=$(id).data("original-title");

        // document.getElementById("article_name1").value = userid;
        url='updateColor.php?q='+userid;
        window.open(url, '_blank');
    }
    function doConfirm(msg, yesFn, noFn)
    {
        var confirmBox = $("#confirmBox");
        confirmBox.find(".message").text(msg);
        confirmBox.find(".yes,.no").unbind().click(function()
        {
            confirmBox.hide();
        });
        confirmBox.find(".yes").click(yesFn);
        confirmBox.find(".no").click(noFn);
        confirmBox.show();
    }
    function newtab1(id){

        if(confirm("Are you sure? color will be permantly deleted press ok!")){
        userid=$(id).data("original-title");

        // document.getElementById("article_name1").value = userid;
        url='colorDelete.php?q='+userid;
        window.open (url,'_self',false)
        }

    }

    $("submit1").click(function(){
        $("panel").show(1000);
    });
    var userName;
    $(function () {
        $("#example1").DataTable({
            "autoWidth": true,
            "lengthChange": true,
            "lengthMenu": [ 5, 10, 25, 50, 100 ]
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

    $('#myModal').on('show.bs.modal', function(e) {
        var userId = $(e.relatedTarget).data('user-name');
        userName = $(e.relatedTarget).data('user-id');
        $(e.currentTarget).find('p[name="user"]').html('You are about to delete <strong>'+userId+'</strong>. Are you sure?');
    });

    $('#resetModal').on('show.bs.modal', function(e) {
        var userId = $(e.relatedTarget).data('user-name');
        userName = $(e.relatedTarget).data('user-id');
        $(e.currentTarget).find('p[name="user-reset"]').html('You want to set default password <i>"Honliz@123"</i> for <strong>'+userId+'</strong>?');
    });




</script>
<div id="confirmBox">
    <div class="message"></div>
    <span class="yes">Yes</span>
    <span class="no">No</span>
</div>
</body>
</html>