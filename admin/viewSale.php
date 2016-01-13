<?php
include_once('dbConnect.php');
/*include ('session.php');
if(isset($_SESSION['USERNAME'])){
    echo "true";
}
else{
header("location: login.php");
}*/
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
            xmlhttp.open("GET", "saleInactive.php?q=" + user + "&a=" + action, true);
            xmlhttp.send();
        }
    </script>
    <meta charset="UTF-8">
    <title>Sale</title>
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

    <?php include "header.php"; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include "sideBar.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sale
                <small>showing all Sale</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h1 class="box-title">Sale Details</h1>
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
                                        <button onclick="userAction(userName,1)" id="yes" data-toggle='modal'
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
                                    <th>Name</th>
                                    <th>Picture</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="userData">
                                <?php
                                $query = "SELECT *  FROM article where sale='1' ";
                                $result = mysqli_query($CONNECTION, $query);
                                if ($result) {
                                    if ($result->num_rows > 0) {
                                        while ($member = mysqli_fetch_assoc($result)) {
                                            $userId = $member['articleId'];
                                            $userName = $member['articleName'];
                                            $pic1 = "images/" . $member['picture1'];

                                            echo "<tr>" .
                                                "<td> {$member['articleId']} </td>" .
                                                "<td> {$member['articleName']} </td>" .
                                                "<td> <img src='.$pic1.'/> </td>" .
                                                "<td align='center'><button class='btn btn-primary btn-xs' data-toggle='tooltip' onclick='newtab(this)' title='' data-user-id='$userId' data-original-title='View'><i class='fa fa-eye'></i></button>&nbsp;" .
                                                "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='#resetModal' title='' data-original-title='Reset Password' data-user-id='$userId' data-user-name='$userName'><i class='fa fa-refresh'></i></button>&nbsp;" .

                                                "</tr>";
                                        }
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Picture</th>
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
        $(e.currentTarget).find('p[name="user-reset"]').html('Do you want to de-activate Sale <strong>' + userId + '</strong>?');
    });
</script>
<script>
    var id1;
    function newtab(id) {
        id1 = $(id).data("user-id");
        var ur = 'articleUpdate.php?q=' + id1;
        window.open(ur, '_blank');
        // alert(id1);
        // requestor(1);
    }

    var status;
    function requestor(action) {
        $(function () {
            if (action == 1) {

                url = 'updateStatus.php?q=' + id1 + '&a=get_tNo';
            }
            $.ajax({
                type: 'GET',
                url: url,                  //the script to call to get data
                data: "",                      //you can insert url argumnets here to pass to api.php                                                 //for example "id=5&parent=6"
                dataType: 'json',                //data format
                success: function (data)          //on recieve of reply
                {
                    if (action == '1') {
                        var ur = 'orders.php?q=' + data[0].trackingNo;
                        window.open(ur, '_blank');
                    }
                }
            });
        });
    }

</script>
</body>
</html>