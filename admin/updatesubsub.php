<style type="text/css">
    #idalert {
        visibility:hidden;
        margin-bottom: 0;
    }
</style>
<script src="notie.js"></script>
<?php
include_once('dbConnect.php');
$pic11="";
$pic2;
$pic3;
$pic11;
$pic22;
$pic33;
$picture;
$q;
$actual_image_name;
$errors = array();
$q=$_GET['q'];
$m=$_GET['m'];
$query3 = "select * from category  where categoryName='$q'";

$result3 = mysqli_query($CONNECTION, $query3);
$table_record3 = mysqli_fetch_array($result3);
$categoryName = $table_record3['categoryName'];
$status = $table_record3['status'];
$pic = $table_record3['pic'];
$description = $table_record3['description'];

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

if(isset($_POST['submit1'])) {
    echo "<script type='text/javascript'>$('#submit1').click(function(event){event.preventDefault(); }); </script>";

    if (empty($_POST["article_name"])) {
        $errors['article_name'] = "Please Fill This Field!";

    } else {
        $article_name = $_POST["article_name"];
    }

    if (empty($_POST["description"])) {
        $errors['description'] = "Please Fill This Field!";

    } else {
        $description = $_POST["description"];
    }
    $afterStatus = 0;
    if (isset($_POST['status'])) {
        $afterStatus = 1;
    }

    $valid_formats = array("jpeg", "jpg", "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP");

    $path1 = "../photo/";
    $art_name = $_POST['article_name'];
    $name = $_FILES['pic1']['name'];
    echo $name;
    $size = $_FILES['pic1']['size'];
    if($name!="") {
        if (strlen($name)) {
            list($txt, $ext) = explode(".", $name);
            if (in_array($ext, $valid_formats)) {
                if ($size < (345 * 777)) {

                    $pic1 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
                    $pic11 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
                    $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
                    $tmp = $_FILES['pic1']['tmp_name'];
                    if (move_uploaded_file($tmp, $path1 . $actual_image_name)) {
                        if (file_exists($path1 . $actual_image_name)) {
                            rename($path1 . $actual_image_name, $path1 . $pic1);
                        }
                        if (empty($errors)) {
                            include_once('dbConnect.php');
                            $sql = "update  `category` SET categoryName='$article_name',pic='$pic1',description='$description',status='$afterStatus' where categoryName='$q'";
                            $result = mysqli_query($CONNECTION, $sql);
                            echo'<style type="text/css">
                #idalert {
                    visibility: visible;
                }
            </style>';         echo "<script> window.open ('addsubsub.php?q=$m','_self',false);</script>";


                        }

                    } else
                        $errors['pic1'] = "Upload Failed";
                } else
                    $errors['pic1'] = "Image size grater than 1MB";
            } else
                $errors['pic1'] = "Invalid File Format";
        } else
            $errors['pic1'] = "Please Select Image File";
    }else{


        if (empty($errors)) {
            include_once('dbConnect.php');
            $sql = "update  `category` SET categoryName='$article_name',description='$description',status='$afterStatus' where categoryName='$q'";
            $result = mysqli_query($CONNECTION, $sql);
            echo'<style type="text/css">
                #idalert {
                    visibility: visible;
                }
            </style>';         echo "<script> window.open ('addsubsub.php?q=$m','_self',false);</script>";



        }
    }}
?>

<!DOCTYPE html>
<html>
<head>

    <script>
        function userAction(user, action) {
            window.alert(user);
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
    <title>Update Sub-Sub Category Name</title>

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
                Update Sub-Sub Category
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
                            <h3 class="box-title">Update Sub-Sub Category Form</h3>
                            <div class="alert alert-success" role="alert" id="idalert" >Action successful</div>

                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id='insertform' enctype="multipart/form-data"  method="Post">
                            <div class=" box-body" >

                                <div class=" col-md-offset-1 form-group" >
                                    <label for="name"    class="col-sm-2 control-label" >Sub-Sub Name*</label>
                                    <p class="help-block text-danger"></p>


                                    <div class="col-sm-9">
                                        <input type="text"   class="form-control" id="article_name1" name="article_name" value='<?php echo $q;?>' placeholder="" required >
                                        <span class="error"><font color="red"> <?php if(isset($errors['article_name'])) echo $errors['article_name'];?></font></span>
                                    </div>
                                </div>

                                <div class=" col-md-offset-1 form-group" >
                                    <label for="name"    class="col-sm-2 control-label" >description*</label>
                                    <p class="help-block text-danger"></p>


                                    <div class="col-sm-9">
                                        <input type="textbox"   class="form-control" id="description1" name="description" value='<?php echo $description; ?>' placeholder="" style="height: 100px" >
                                        <span class="error"><font color="red"> <?php if(isset($errors['description'])) echo $errors['description'];?></font></span>
                                    </div>
                                </div>

                                <div class=" col-md-offset-1 form-group" >
                                    <label for="small" class="col-sm-3 control-label">Active</label>

                                    <div class="col-sm-1 ">
                                        <input type="checkbox" class=" checkbox" id="status" name="status" <?php if($status) { ?>checked=<?php echo $status; } ?>  >
                                    </div>
                                </div>

                                <div class=" form-group">
                                    <div class="col-md-12">
                                        <input type="file"  name="pic1" id="pic1"  />
                                        <span class="error"><font color="red"> </font></span>
                                    </div>
                                </div>

                                <div class=" form-group">
                                    <div class="col-md-12">
                                        <img src='<?php echo "../photo/".$pic; ?>'width="50%" height="20%" border="1" />

                                    </div>
                                </div>




                            </div>
                            <div class="box-footer">
                                <button  name="submit1" " data-toggle="tooltip" data-original-title='Submits'  id="submit1"class="btn btn-info pull-right" >Update</button>
                            </div><!-- /.box-footer -->



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

<!-- page script -->
<script type="text/javascript">



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
</body>
</html>