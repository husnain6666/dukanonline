<?php
//include_once('session.php');
include_once('dbConnect.php');
/*if(isset($_SESSION['USERNAME'])){
}
else{
header("location: login.php");
}*/
?>
<!DOCTYPE html>
<html>
<head>


    <meta charset="UTF-8">
    <title>Articles</title>
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
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
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
            Articles
            <small>showing all articles</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">Articles</h1>
                    </div>
                    <!-- /.box-header -->
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
                                    <button onclick='requestor(1)' id="yes" data-toggle='modal'
                                            data-target='#successModal' type="button" class="btn btn-danger"
                                            data-dismiss="modal">YES
                                    </button>
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
                                    <button onclick="userAction(userName,2)" id="yes-reset" data-toggle='modal'
                                            data-target='#successModal' type="button" class="btn btn-danger"
                                            data-dismiss="modal">YES
                                    </button>
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

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Art. Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                       <!--         <th>Color</th>
                                     <th>Qty</th>

                        -->
                                <th>Date</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="userData">
                            <?php
                            $query = "SELECT * FROM article";
                            $result = mysqli_query($CONNECTION, $query);
                            if ($result) {
                                if ($result->num_rows > 0) {
                                    while ($member = mysqli_fetch_assoc($result)) {
                                        $userId = $member['articleId'];
                                        //$userName = $member['firstName'];


                                        echo "<tr>" .
                                            "<td> {$member['articleId']} </td>" .
                                            "<td> {$member['articleName']} </td>" .
                                            "<td> {$member['Category']} </td>" .
                                            "<td> {$member['brand']} </td>" .
                                            //"<td> {$member['color']}</td>" .
                                            "<td> {$member['date']} </td>" .
                                            //"<td> {$member['quantity']} </td>" .
                                            "<td> {$member['price']} </td>" .
                                            "<td align='center'>" .
                                            "<a href='../product.php?articleId={$member['articleId']}' target='_blank'><button  class='btn btn-primary btn-xs' data-toggle='modal' data-target='' title='' onclick=''  data-user-id='$userId'><i class='fa fa-eye'></i></button></a>&nbsp;<a href='articleUpdate.php?q={$member['articleId']}' target='_blank'><button class='btn btn-success btn-xs' data-toggle='modal' data-target='' title='' onclick='newtab(this)' data-original-title='Reset Password' data-user-id='$userId'><i class='fa fa-refresh'></i></button>&nbsp;" .
                                            "</td>" .
                                           "</tr>";
                                    }
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Art. Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Date</th>
                                <!--         <th>Color</th>
                                   <th>Qty</th>

                      -->
                                <th>Price</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
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
<!-- page script -->
<script type="text/javascript">
    var userName;
    var userId;
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

    $('#myModal').on('show.bs.modal', function (e) {
        userId = $(e.relatedTarget).data('user-id');
        $(e.currentTarget).find('p[name="user"]').html('You are about to delete <strong>' + userId + '</strong>. Are you sure?');
    });

    $('#resetModal').on('show.bs.modal', function (e) {
        userId = $(e.relatedTarget).data('user-id');
        $(e.currentTarget).find('p[name="user-reset"]').html('You want to set default password <i>"Honliz@123"</i> for <strong>' + userId + '</strong>?');
    });
</script>
<script>
    /*
    var id1;
    var userid;
    function newtab(id) {
        userid = $(id).data("user-id");

        url = 'articleUpdate.php?q=' + userid;
        window.open(url, '_blank');
    }

    var status;
    function requestor(action) {
        $(function () {
            if (action == 1) {

                url = 'updateStatus.php?q=' + userId + '&a=del';

            }

            $.ajax({ type: 'GET',
                url: url,                  //the script to call to get data
                data: "",                        //you can insert url argumnets here to pass to api.php
                //for example "id=5&parent=6"
                dataType: 'json',                //data format
                success: function (data)          //on recieve of reply
                {
                    if (action == '1') {
                        if (data[0] == '1') {
                            window.location.reload();
                        }
                    }

                }
            });
        });
    }
*/
</script>
</body>
</html>