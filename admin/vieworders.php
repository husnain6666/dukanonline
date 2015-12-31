<?php
include_once('session.php');
include_once('dbConnect.php');
/*if(isset($_SESSION['USERNAME'])){
}
else{
header("location: login.php");
}*/
$a=$_GET['a'];
$query ="UPDATE `notifications` SET  `status`='Read' WHERE trackingId='$a'";
$result = mysqli_query($CONNECTION, $query);
$tTp=0;
$data=array();
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
    <title>View Orders</title>
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
            <small>showing all Orders related search</small>
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

                
                
                
                
                
                 <div class="box-header with-border">
                     <h3 class="box-title">
                          <?php
                         $query = "SELECT userinfo.firstName, article.articleName,orderdetails.quantity,orderdetails.totalPrice,article.specification, orderdetails.trackingNo from article INNER join orderdetails on article.articleId=orderdetails.articleId And orderdetails.trackingNo='$a'  inner join userinfo on orderdetails.userId=userinfo.userId";
                    $result = mysqli_query($CONNECTION, $query);
                    $data=$result;
                            //mysqli_fetch_array($result);
                    if($result) {
                        if($result->num_rows > 0) {
                            while ($order = mysqli_fetch_assoc($result)) {
                               
                            }
                        }
                    }
                    //echo $data[0];
                    ?>
                     </h3>
                  <div class="box-tools pull-right">
                  </div>
                 </div><!-- /.box-header -->
                 
                 
                 
                 
                
                 <div class="box box-info" id="form" >
                <div class="box-header with-border">
                  <h3 class="box-title">Order Details</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal">
                 <div class=" box-body" >
                     <?php
                            $query = "SELECT userinfo.firstName, article.articleName,orderdetails.quantity,orderdetails.orderId,orderdetails.totalPrice,article.specification, orderdetails.trackingNo from article INNER join orderdetails on article.articleId=orderdetails.articleId And orderdetails.trackingNo='$a'  inner join userinfo on orderdetails.userId=userinfo.userId inner join ordertracking on ordertracking.trackingNo = orderdetails.trackingNo";
                    $result = mysqli_query($CONNECTION, $query);
                            //mysqli_fetch_array($result);
                    if($result) {
                        if($result->num_rows > 0) {
                    while ($order = mysqli_fetch_assoc($result)) {
                        echo "<div class='form-group' >"
                              ."<label for='name'    class='col-sm-2 control-label' >Tracking No*</label>"
                               ."<div class='col-sm-4'> <input type='text'   class='form-control' value='{$a}'   disabled > "
                               ."</div></div>";
                               
                               echo "<div class='form-group' >"
                              ."<label for='name'    class='col-sm-2 control-label' >Customer Name*</label>"
                               ."<div class='col-sm-4'> <input type='text'   class='form-control' value='{$order['firstName']}'   disabled > "
                               ."</div></div>";
                               
                        /*       echo "<div class='form-group' >"
                              ."<label for='name'    class='col-sm-2 control-label' >Shipping Address*</label>"
                               ."<div class='col-sm-8'> <input type='text'   class='form-control' value='{$order['shippingAddress']}'   disabled > "
                               ."</div></div>";
                          */     break;
                    
                    }
                        }
                    }
                    ?>

                     <?php
                     $query = "SELECT * from shippingadress where trackingNo='$a'";
                     $result = mysqli_query($CONNECTION, $query);
                     //mysqli_fetch_array($result);
                     if($result) {
                         if($result->num_rows > 0) {
                             while ($order = mysqli_fetch_assoc($result)) {

                                 echo "<div class='form-group' >"
                                     ."<label for='name'    class='col-sm-2 control-label' >Address</label>"
                                     ."<div class='col-sm-4'> <input type='text'   class='form-control' value='{$order['address']}'   disabled > "
                                     ."</div></div>";

                                 echo "<div class='form-group' >"
                                     ."<label for='name'    class='col-sm-2 control-label' >Contact</label>"
                                     ."<div class='col-sm-4'> <input type='text'   class='form-control' value='{$order['phoneNo']}'   disabled > "
                                     ."</div></div>";



                                 echo "<div class='form-group' >"
                                     ."<label for='name'    class='col-sm-2 control-label' >Message from Client</label>"
                                     ."<div class='col-sm-4'> <input type='text-area'   class='form-control' value='{$order['importantMsg']}'   disabled > "
                                     ."</div></div>";

                                 echo "<div class='form-group' >"
                                     ."<label for='name'    class='col-sm-2 control-label' >City</label>"
                                     ."<div class='col-sm-4'> <input type='text'   class='form-control' value='{$order['city']}'   disabled > "
                                     ."</div></div>";
                                 echo "<div class='form-group' >"
                                     ."<label for='name'    class='col-sm-2 control-label' >Country</label>"
                                     ."<div class='col-sm-4'> <input type='text'   class='form-control' value='{$order['country']}'   disabled > "
                                     ."</div></div>";



                                 /*       echo "<div class='form-group' >"
                                       ."<label for='name'    class='col-sm-2 control-label' >Shipping Address*</label>"
                                        ."<div class='col-sm-8'> <input type='text'   class='form-control' value='{$order['shippingAddress']}'   disabled > "
                                        ."</div></div>";
                                   */     break;


                             }
                         }
                     }

                     $query = "SELECT * from ordertracking where trackingNo='$a' ";
                     $result = mysqli_query($CONNECTION, $query);

                     $table_record=mysqli_fetch_array($result);
                     $status=$table_record['status'];
                     $shippingMethod=$table_record['shippmentMethod'];
                     if ($shippingMethod==="freeshipping")
                         $shippingMethod='free shipping';
                     else
                         $shippingMethod='per irem shipping';

                     $paymentMethod=$table_record['paymentMethod'];
if($paymentMethod==='COD')
                     $paymentMethod='Cash on Delivery';
                     else
                     $paymentMethod='Bank Transfer';

                     $TotalAmount=$table_record['totalAmount'];
                     echo "<div class='form-group' >"
                         ."<label for='name'    class='col-sm-2 control-label' >Status</label>"
                         ."<div class='col-sm-4'> <input type='text'   class='form-control' value='{$status}'   disabled > "
                         ."</div></div>";

                     echo "<div class='form-group' >"
                         ."<label for='name'    class='col-sm-2 control-label' >Shipment Method</label>"
                         ."<div class='col-sm-4'> <input type='text'   class='form-control' value='{$shippingMethod}'   disabled > "
                         ."</div></div>";
                     echo "<div class='form-group' >"
                         ."<label for='name'    class='col-sm-2 control-label' >Payment Method</label>"
                         ."<div class='col-sm-4'> <input type='text'   class='form-control' value='{$paymentMethod}'   disabled > "
                         ."</div></div>";
                     echo "<div class='form-group' >"
                         ."<label for='name'    class='col-sm-2 control-label' >Total Amount </label>"
                         ."<div class='col-sm-4'> <input type='text'   class='form-control' value='Rs.{$TotalAmount}'   disabled > "
                         ."</div></div>";

                     ?>

  </body>
                    <div class="box-footer"> 
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Products</h3>
                  <div class="box-tools pull-right">
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                 
                    <?php
                            $query = "SELECT userinfo.firstName,article.articleId, article.articleName, orderdetails.quantity,article.picture1,orderdetails.totalPrice,article.specification, orderdetails.trackingNo from article INNER join orderdetails on article.articleId=orderdetails.articleId And orderdetails.trackingNo='$a' inner join userinfo on orderdetails.userId=userinfo.userId inner join ordertracking on ordertracking.trackingNo = orderdetails.trackingNo";
                    $result = mysqli_query($CONNECTION, $query);
                            //mysqli_fetch_array($result);
                    if($result) {
                        if($result->num_rows > 0) {
                    while ($order = mysqli_fetch_assoc($result)) {
                    echo "<li class='item'>"
                          ."<div class='product-img'>"//'http://www.honliz.com/photo/{$order['picture1']}
                            ."<a href='http://www.electroshop.pk/photo/{$order['picture1']}' target='_blank'><img src='http://www.electroshop.pk/photo/{$order['picture1']}' alt='Product Image' /></a>"
                            ."</div>"
                            ."<div class='product-info'>"
                            ."<a href='http://www.electroshop.pk/products_page_v1.php?articleId={$order['articleId']}' target='_blank' class='product-title'><font size='5px'>{$order['articleName']}</font><span class='label label-danger pull-right'><h4>Price: {$order['totalPrice']}</h4></span><span>&nbsp;</span><span class='label label-warning pull-right'><h4>Quantity: {$order['quantity']}</h4></span><span>&nbsp;</span><span class='label label-success pull-right'></span></a>"
                            ."<span class='product-description'>"
                                    ."{$order['specification']}"
                                        ."</span>
                      </div>
                    </li>";
                            $tTp +=$order['totalPrice'];
                                    
                            }
                        }
                    }
                    
                    ?>
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                    <span class='label label-danger pull-right'><h4><?php echo 'Total: '.$tTp; ?></h4></span>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              </div>
              </form>
                </div>
              
              
              
              
              
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
