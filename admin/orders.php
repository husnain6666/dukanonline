<?php
include_once('dbConnect.php');

$checking=array();
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
    <title>Orders</title>
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
        Orders
        <small>showing all Orders</small>
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
                <button  id="yes" data-toggle='modal' data-target='#successModal' type="button" class="btn btn-danger" data-dismiss="modal">YES</button>
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
                <h4 class="modal-title">Change Status</h4>
            </div>
            <div class="modal-body">
                <p id="user-reset" name="user-reset"></p></br>
                <div class="form-group col-sm-8">

                    <select class=" form-control" id="status" name="status" >
                        <option>In Progress</option>
                        <option>Delivered</option>
                        <option>Pending</option>
                        <option>Shipped</option>
                        <option>Confirmed</option>
                       <option>Cancelled</option>
                    </select>
                    <span class="error"><font color="red"> <?php if(isset($errors['seat_no'])) echo $errors['seat_no'];?></font></span>

                </div>
                </br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
                <button onclick="requestor(1)" id="yes-reset" data-toggle='modal' data-target='#successModal' type="button" class="btn btn-danger" data-dismiss="modal">YES</button>
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



<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Orders</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Tracking No</th>
                    <th>Address</th>

                    <th>Date</th>
                    <th>Status</th>

                    <th>Order</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(isset($_GET['q'])){
                    $q=$_GET['q'];
                    $query = "SELECT DISTINCt orderdetails.trackingNo , ordertracking.date ,ordertracking.status from ordertracking inner join orderdetails on orderdetails.userId='$q' and orderdetails.trackingNo=ordertracking.trackingNo";
                    $result = mysqli_query($CONNECTION, $query);
                    if($result) {
                        if($result->num_rows > 0) {
                            while ($order = mysqli_fetch_assoc($result)) {
                                $userId = $order['trackingNo'];


                                echo     "<tr>"
                                    . "<td>{$order['trackingNo']} </td>"
                                    .  "<td>{$order['date']}</td>";

                                if(strtolower($order['status'])=="delivered"){
                                    echo "<td><span class='label label-danger'>{$order['status']}</span></td>";

                                }
                                else if(strtolower($order['status'])=="in progress"){
                                    echo "<td><span class='label label-info'>{$order['status']}</span></td>";

                                }
                                else if(strtolower($order['status'])=="shipped"){
                                    echo "<td><span class='label label-success'>{$order['status']}</span></td>";

                                }
                                else if(strtolower($order['status'])=="pending"){
                                    echo "<td><span class='label label-warning'>{$order['status']}</span></td>";

                                }
                                else if(strtolower($order['status'])=="confirmed"){
                                    echo "<td><span class='label label-danger'>{$order['status']}</span></td>";

                                }
                                else if(strtolower($order['status'])=="cancelled"){
                                    echo "<td><span class='label label-danger'>{$order['status']}</span></td>";

                                }



                                echo   "<td align='center'><button class='btn btn-primary btn-xs' data-toggle='tooltip' title='' data-user-id='{$order['trackingNo']}' onclick='newtab(this)' data-original-title='View'><i class='fa fa-eye'></i></button>&nbsp;".
                                    "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='#resetModal' title='' data-original-title='Reset Password' data-user-id='{$order['trackingNo']}' ><i class='fa fa-refresh'></i></button>&nbsp;".
                                    "</tr>";

                            }
                        }
                    }

                }
                else{
                    $query = "SELECT * FROM ordertracking Where 1";
                    $result = mysqli_query($CONNECTION, $query);
                    if($result) {
                        if($result->num_rows > 0) {
                            while ($order = mysqli_fetch_assoc($result)) {
                                $userId = $order['trackingNo'];

                                echo     "<tr>"
                                    . "<td>{$order['trackingNo']} </td>"
                                    .  "<td></td>"

                                    .  "<td>{$order['date']}</td>";



                                if(strtolower($order['status'])=="delivered"){
                                    echo "<td><span class='label label-danger'>{$order['status']}</span></td>";

                                }
                                else if(strtolower($order['status'])=="in progress"){
                                    echo "<td><span class='label label-info'>{$order['status']}</span></td>";

                                }
                                else if(strtolower($order['status'])=="shipped"){
                                    echo "<td><span class='label label-success'>{$order['status']}</span></td>";

                                }

                                else if(strtolower($order['status'])=="pending"){
                                    echo "<td><span class='label label-warning'>{$order['status']}</span></td>";

                                }
                                else if(strtolower($order['status'])=="confirmed"){
                                    echo "<td><span class='label label-danger'>{$order['status']}</span></td>";

                                }
                                else if(strtolower($order['status'])=="cancelled"){
                                    echo "<td><span class='label label-danger'>{$order['status']}</span></td>";

                                }

                                echo   "<td align='center'><button class='btn btn-primary btn-xs' data-toggle='tooltip' title='' data-user-id='{$order['trackingNo']}' onclick='newtab(this)' data-original-title='View'><i class='fa fa-eye'></i></button>&nbsp;".
                                    "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='#resetModal' title='' data-original-title='Reset Password' data-user-id='{$order['trackingNo']}' ><i class='fa fa-refresh'></i></button>&nbsp;".
                                    "</tr>";

                            }
                        }
                    }
                }
                ?>
                <script>
                    function newtab(a){
                        var trackingNo=$(a).attr("data-user-id");
                        var url="vieworders.php?a="+trackingNo;
                        OpenInNewTab(url);
                    }

                    function OpenInNewTab(url) {
                        var win = window.open(url, '_blank');
                        win.focus();
                    }
                </script>

                </tbody>
            </table>
        </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
    </div><!-- /.box-footer -->
</div><!-- /.box -->







</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div>



</div><!-- ./wrapper -->
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
    var userId;
    var url;
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
        userId = $(e.relatedTarget).data('user-id');
        $(e.currentTarget).find('p[name="user-reset"]').html('You want to change order status where <i>"Tracking No"</i> is <strong>'+userId+'</strong>?');
    });
</script>
<script>
    var status;
    function requestor(action){
        $(function ()
        {
            if(action==1){
                status= document.getElementById('status').value;
                url='updateStatus.php?q='+userId+'&status='+status+'&a=status';
            }

            $.ajax({ type: 'GET',
                url: url,                  //the script to call to get data
                data: "",                        //you can insert url argumnets here to pass to api.php
                //for example "id=5&parent=6"
                dataType: 'json',                //data format
                success: function(data)          //on recieve of reply
                {
                    if(action=='1'){



                    }

                }
            });
        });
    }
    $('#successModal').on('hidden.bs.modal', function (e) {
        window.location.reload();
    })
</script>
</body>
</html>