<style type="text/css">
    #idalert {
       visibility:hidden;
        margin-bottom: 0;
    }
</style>
<?php
include_once('dbConnect.php');
//include_once('session.php');
$pic1;
$pic2;
$pic3;
$pic11;
$pic22;
$pic33;
$errors = array();
$pass= randomPassword();

?>

<?php

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
?>

<!DOCTYPE html>
<html>
  <head>


    <meta charset="UTF-8">
    <title>Add New Article</title>
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
            Add Articles
            <small>Add New Article Form</small>
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
                              <!--    <button onclick="userAction(userName,1)" id="yes" data-toggle='modal' data-target='#successModal' type="button" class="btn btn-danger" data-dismiss="modal">YES</button>-->
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
                                  <!--<button onclick="userAction(userName,2)" id="yes-reset" data-toggle='modal' data-target='#successModal' type="button" class="btn btn-danger" data-dismiss="modal">YES</button>-->
                              </div>
                          </div>

                      </div>
                  </div>

                 <!-- <div class="alert alert-success" role="alert" >Action successful</div>
-->
                  <!-- Horizontal Form -->
                  <div class="box box-info" id="form" >
                  <div class="box-header with-border">
                      <h3 class="box-title">Add New Article Form</h3>
                  </div>

                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="articleadd.php" enctype="multipart/form-data"  method="Post">
                  <div class=" box-body">


                      <div class=" col-md-offset-1 form-group">
                          <label for="name" class="col-sm-2 control-label">Article Name*</label>

                          <p class="help-block text-danger"></p>

                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="article_name" name="article_name"
                                     placeholder="" required>
                              <span class="error"><font
                                      color="red"> <?php if (isset($errors['article_name'])) echo $errors['article_name']; ?></font></span>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="category" class="col-sm-2 control-label">Category*</label>

                          <div class="col-sm-4">
                              <select class="form-control col-sm-9" name="categoryName" required>
                                  <?php
                                  include("dbConnect.php");
                                  $query = "SELECT * FROM `category`";
                                  $result = mysqli_query($CONNECTION, $query);
                                  if ($result) {
                                      if ($result->num_rows > 0) {
                                          while ($notify = mysqli_fetch_assoc($result)) {
                                              $categoryName = $notify['categoryName'];
                                              echo "<span class='label label-danger'>$count</span>";
                                              ?>
                                              <option><?php echo $categoryName; ?></option>
                                          <?php }
                                      }
                                  } ?>
                              </select>
                          </div>

                          <label for="category" class="col-sm-1 control-label">Brand*</label>

                          <div class="col-sm-4">
                              <select class="form-control col-sm-9" name="brandnames" required>
                                  <?php
                                  include("dbConnect.php");
                                  $query1 = "SELECT brandName FROM brand";
                                  $result = mysqli_query($CONNECTION, $query1);
                                  if ($result) {
                                      if ($result->num_rows > 0) {
                                          while ($notify = mysqli_fetch_assoc($result)) {
                                              $brandName = $notify['brandName'];
                                              ?>
                                              <option><?php echo $brandName; ?></option>
                                          <?php }
                                      }
                                  } ?>
                              </select>
                          </div>
                      </div>

                  </div>

                  <div class="form-group">
                      <label for="specification" class="col-sm-2 control-label">Intro*</label>

                      <div class="col-sm-9">
                          <textarea rows="2" cols="20" type="text" class="form-control" name="introspec" required></textarea>
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['introspec'])) echo $errors['introspec']; ?></font></span>
                      </div>

                  </div>
                  <div class="form-group">
                      <label for="specification" class="col-sm-2 control-label">Details*</label>

                      <div class="col-sm-9">
                          <textarea rows="3" cols="30" type="text" class="form-control" name="detailsspec" required></textarea>
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['detailsspec'])) echo $errors['detailsspec']; ?></font></span>
                      </div>

                  </div>

                  <div class="form-group">
                      <label for="specification" class="col-sm-2 control-label">Specification*</label>

                      <div class="col-sm-9">
                          <textarea rows="5" cols="50" type="text" class="form-control" id="todolist" name="specification" required></textarea>
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['specification'])) echo $errors['specification']; ?></font></span>
                      </div>

                  </div>


                  <div class="form-group">
                      <label for="small" class="col-sm-3 control-label">Hot Deal</label>

                      <div class="col-sm-1 ">
                          <input type="checkbox" class=" checkbox" id="hotdeal" name="hot_deal">
                      </div>

                      <label for="Medium" class="col-sm-2 control-label">Featured</label>

                      <div class="col-sm-1">
                          <input type="checkbox" class=" checkbox" id="bestseller" name="bestseller">
                      </div>

                      <label for="large" class="col-sm-2 control-label">Sale</label>

                      <div class="col-sm-1">
                          <input type="checkbox" class=" checkbox" id="sale" name="sale">
                      </div>


                  </div>


                      <div class="form-group">
                          <label for="specification" class="col-sm-2 control-label">Picture Tag</label>

                          <div class="col-sm-4">
                              <select class="form-control col-sm-9" name="picTag">
                                  <option></option>
                                  <option>HOT</option>
                                  <option>SALE</option>
                                  <option>NEW</option>
                                  <option>FEATURED</option>
                              </select>
                          </div>
                      </div>


                  <!--	<div class="form-group">
                      <label for="qty" class="col-sm-2 control-label" align="left">Total Quantity</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" onchange="count_total()" min="0" onkeyup="count_total()" id="quantity" name="quantity" align="left" placeholder="" required>
						<span class="error"><font color="red"> <?php //if(isset($errors['quantity'])) echo $errors['quantity'];?></font></span>
                      </div>
			
                    </div>-->


                  <div class="form-group">
                      <label for="qty" class="col-sm-2 control-label" align="left">Price/Piece*</label>

                      <div class="col-sm-4">
                          <input type="number" class="form-control" onchange="total_price()" min="0" id="ppp" name="ppp"
                                 align="left" placeholder="Price / Piece*" required>
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['ppp'])) echo $errors['ppp']; ?></font></span>
                      </div>

                      <label for="qty" class="col-sm-2 control-label" align="left">Discount Percentage</label>

                      <div class="col-sm-3">
                          <input type="number" class="form-control" value="0" onchange="total_price()" min="0"
                                 onkeyup="total_price()" id="tp" name="tp" align="left">
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['tp'])) echo $errors['tp']; ?></font></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="to" class="col-sm-2 control-label" align="left">Date*</label>

                      <div class="col-sm-4">
                          <input type="text" id="datepicker" class="form-control" name="datepicker" required>
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['date'])) echo $errors['date']; ?></font></span>
                      </div>
                      </div>

                  <div class="form-group">
                      <label for="category" class="col-sm-2 control-label">Choose Color</label>
                      <div class="col-sm-2">
                      <select class="form-control col-sm-9" id="ChoseColors">
                          <option>red</option>
                          <option>green</option>
                          <option>black</option>
                          <option>blue</option>
                          <option>yellow</option>
                          <option>orange</option>
                          <option>purple</option>
                      </select>
                      </div>

                      <label for="TIME IN" class="col-sm-1 control-label"  align="right">Color</label>
                      <span class="col-sm-5"><input readonly type="text" align="left"id="colorid" name="colors" class="form-control" />
                          </span>
                      <span class="error" ><font color="red"> <?php //if(isset($errors['color'])) echo $errors['color'];?></font></span>
                      <a class="btn btn-primary" onclick='f1()'><i class="fa fa-plus"></i></a>
                      <a class="btn btn-danger" onclick='f2()'><i class="fa fa-minus"></i></a>
                    </div>

                      <div class="form-group">
                          <label for="category" class="col-sm-2 control-label">Choose Size</label>
                          <div class="col-sm-2">
                              <select class="form-control col-sm-9" id="ChooseSize">
                                  <option>XS</option>
                                  <option>S</option>
                                  <option>M</option>
                                  <option>N</option>
                                  <option>L</option>
                                  <option>XL</option>
                                  <option>XXL</option>
                              </select>
                          </div>

                          <label for="TIME IN" class="col-sm-1 control-label"  align="right">Size</label>
                      <span class="col-sm-5"><input readonly type="text" align="left"id="sizeid" name="size" class="form-control" />
                          </span>
                          <span class="error" ><font color="red"> <?php //if(isset($errors['color'])) echo $errors['color'];?></font></span>
                          <a class="btn btn-primary" onclick='f3()'><i class="fa fa-plus"></i></a>
                          <a class="btn btn-danger" onclick='f4()'><i class="fa fa-minus"></i></a>
                      </div>

                  <div class=" form-group">
                      <label for="qty" class="col-sm-2 control-label" align="left">Choose Picture1*</label>

                      <div class="col-sm-offset-2">
                          <input type="file" class="col-sm-8 control-label" name="pic1" id="pic1" >
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['pic1'])) echo $errors['pic1']; ?></font></span>
                      </div>
                  </div>


                  <div class=" form-group">
                      <label for="qty" class="col-sm-2 control-label" align="left">Choose Picture2</label>

                      <div class="col-sm-offset-2">
                          <input type="file" class="col-sm-8 control-label" name="pic2" id="pic2" >
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['pic2'])) echo $errors['pic2']; ?></font></span>
                      </div>
                  </div>
                  <div class=" form-group">
                      <label for="qty" class="col-sm-2 control-label" align="left">Choose Picture3</label>

                      <div class="col-sm-offset-2">
                          <input type="file" class="col-sm-8 control-label" name="pic3" id="pic3"
                                 >
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['pic3'])) echo $errors['pic3']; ?></font></span>
                      </div>
                  </div>

                  </div>


    <!--           <div class="form-group " id="no_of_guest" style="  display:none">
                      <label for="Guest_count" class="col-sm-2 control-label">No. Of Guest*</label>
                      <div class="col-sm-4">
                        <input type="text" id="input_no_guest" name="input_no_guet" class="form-control"  placeholder="No. Of Guest*" >
						<span class="error"><font color="red"> <?php if(isset($errors['input_no_guest'])) echo $errors['input_no_guest'];?></font></span>
                      </div>
               </div>
        -->          <div id="successModal" class="modal fade modal-success" role="dialog">
                      <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Success</h4>
                              </div>
                         <!--     <div class="modal-body">
                                  <h4>Action Successful&nbsp;<i class="glyphicon glyphicon-ok"></i></h4>
                              </div>
                          --></div>

                      </div>
                  </div>

			</div><!-- /.box-body -->
			<!--	<div class='errorabcd' style='display:none'>Event Created</div>
                -->        <div class="box-footer">
                            <button  name="submit1"    id="submit1" class="btn btn-info pull-right" >Submit</button>
                         </div><!-- /.box-footer -->
        </form>
              </div><!-- /.box -->

      </div><!-- /.col -->
          <!-- /.row -->
        </section><!-- /.content -->
    </div>
      <div class="control-sidebar-bg"></div>

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
    //<script src="plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    
   // <link href="plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
   
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
   
//$('#successModal').modal('show'); 


</script>
<script>
  $(function() {
   // $( "#datepicker" ).datepicker();
   $("#datepicker").datepicker({
        dateFormat: "yyyy-mm-dd"
    });
  });
 // $('#color').colorpicker({flat: true});
  </script>
  
  <script>

      function f1()
      {
          var com=-1;
          var sel=document.getElementById("ChoseColors");
          var sv = sel.options[sel.selectedIndex].value;
          var color=document.getElementById("colorid").value;
          if(color=="")
          {
              document.getElementById("colorid").value=sv;
          }
          else
          {
              var res = color.split(",");
              for(var i = 0; i < res.length; i++)
              {
                  if(res[i]==sv){
                      com=0;
                  }

              }
              if(com==-1)
              {
                  document.getElementById("colorid").value=color+","+sv;
              }
              else
              {
                  alert("Color already Exists!");
              }
          }
      }

      function f2()
      {
          var com;
          var text="s";
          var sel=document.getElementById("ChoseColors");
          var sv = sel.options[sel.selectedIndex].value;
          var color=document.getElementById("colorid").value;
          if(color=="")
          {
          }
          else
          {
              var res = color.split(",");
              for(var i = 0; i < res.length; i++)
              {
                  var n = res[i].localeCompare(sv);
                  if(n==0)
                  {
                      com=i;
                      break;
                  }

              }
              for(var i = 0; i < res.length; i++)
              {
                  if(res[com]==res[i]){

                  }else{
                      if(text=="s")
                      {
                          text=res[i];
                      }
                      else
                      {
                          text=text+","+res[i];
                      }
                  }


              }
              if(text=="s"){
                  text="";
              }
              document.getElementById("colorid").value=text;

          }


      }

      function f3()
      {
          var com=-1;
          var sel=document.getElementById("ChooseSize");
          var sv = sel.options[sel.selectedIndex].value;
          var color=document.getElementById("sizeid").value;
          if(color=="")
          {
              document.getElementById("sizeid").value=sv;
          }
          else
          {
              var res = color.split(",");
              for(var i = 0; i < res.length; i++)
              {
                  if(res[i]==sv){
                      com=0;
                  }

              }
              if(com==-1)
              {
                  document.getElementById("sizeid").value=color+","+sv;
              }
              else
              {
                  alert("Size already Exists!");
              }
          }
      }

      function f4()
      {
          var com;
          var text="s";
          var sel=document.getElementById("ChooseSize");
          var sv = sel.options[sel.selectedIndex].value;
          var color=document.getElementById("sizeid").value;
          if(color=="")
          {
          }
          else
          {
              var res = color.split(",");
              for(var i = 0; i < res.length; i++)
              {
                  var n = res[i].localeCompare(sv);
                  if(n==0)
                  {
                      com=i;
                      break;
                  }

              }
              for(var i = 0; i < res.length; i++)
              {
                  if(res[com]==res[i]){

                  }else{
                      if(text=="s")
                      {
                          text=res[i];
                      }
                      else
                      {
                          text=text+","+res[i];
                      }
                  }


              }
              if(text=="s"){
                  text="";
              }
              document.getElementById("sizeid").value=text;

          }


      }

      function count_total(action){

              var s=document.getElementById('small').value;
              if(s<0) {
              	document.getElementById('small').value=0;
              	s=document.getElementById('small').value;
              }
              var m=document.getElementById('medium').value;
              if(m<0) {
              	document.getElementById('medium').value=0;
             	m=document.getElementById('medium').value;
              }
              var l=document.getElementById('large').value;
              if(l<0) {
              	document.getElementById('large').value=0;
              	l=document.getElementById('large').value;
              }
              var xl=document.getElementById('xl').value;
              if(xl<0) {
              	document.getElementById('xl').value=0;
              	xl=document.getElementById('xl').value;
              }
              var total=+s + +m + +l + +xl;
                  document.getElementById('quantity').value=total;
              if(document.getElementById('quantity').value>total)
                  document.getElementById('quantity').value=total;   
              
          
          
          
      }

      function total_price(){
          var qty =document.getElementById('quantity').value;
          var pp =document.getElementById('ppp').value;
          var total = document.getElementById('tp').value;
          if(total > 100)
             document.getElementById('tp').value = '100';
          if(total < 0)
             document.getElementById('tp').value = '0';
      }

</script>
</body>
</html>