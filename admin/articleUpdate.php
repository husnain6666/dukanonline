<style type="text/css">
    #idalert {
        visibility:hidden;
        margin-bottom: 0;
    }
</style>
<script type="text/javascript">
    function formatTextArea(textArea) {
        textArea.value = textArea.value.replace(/(^|\r\n|\n)([^\u21D2 ]|$)/g, "$1\u21D2 bullet $2");
    }

    window.onload = function() {
        var textArea = document.getElementById("todolist");
        textArea.onkeyup = function(evt) {
            evt = evt || window.event;

            if (evt.keyCode == 13) {
                formatTextArea(this);
            }
        };
    };
</script>

<?php
include_once('dbConnect.php');
//include_once('session.php');

/*
if(isset($_SESSION['USERNAME'])){	
}
else{
header("location: login.php");
}*/

$pic1="";
$pic2="";
$pic3="";
$pass= randomPassword();
$sale1 ="";
$week_sale ="";
$bestsale="";


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

<script type="text/javascript">

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
                alert("Color already Exist");
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
</script>
<?php
$path ="http://www.electroshop.pk/photo/";
$pic11="";
$pic22="";
$pic33="";
$errors = array();
$ar_id="";
$ar_brandname="";
$ar_name="";
$ar_category="";
$ar_color="";
$ar_date="";
$ar_small="";
$ar_medium="";
$ar_large="";
$ar_xlarge="";
$ar_quantity="";
$ar_decription="";
$specification="";
$ar_gender="";
$ar_size_id="";
$ar_price="";
$ar_care="";
$ar_material="";
$sale1="";

$picture1;
$picture2;
$picture3;

if (!empty($_GET['q'])) {
    include("dbConnect.php");
    $q = $_GET['q'];
    $query = "SELECT  * from article WHERE  article.articleId='$q'";
    $result = mysqli_query($CONNECTION, $query);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($notify = mysqli_fetch_assoc($result)) {

                $ar_id = $notify['articleId'];
                $ar_name = $notify['articleName'];
                $ar_category = $notify['Category'];
               // $ar_color = $notify['color'];
                $ar_date = $notify['date'];
                $ar_brandname = $notify['brand'];
               // $ar_quantity = $notify['quantity'];
                $ar_price = $notify['price'];
                $picture1 = $notify['picture1'];
                $picture2 = $notify['picture2'];
                $picture3 = $notify['picture3'];


                $specification = $notify['specification'];
                $myArray = explode('0_0', $specification);
               $intrduction= $myArray[0];
                $detail1= $myArray[1];
                $spec1= $myArray[2];

                $week_sale = '';
                if ($notify['weekDeal']) {
                    $week_sale = 'checked="checked"';
                }
                $bestsale = '';
                if ($notify['bestSeller']) {
                    $bestsale = 'checked="checked"';
                }
                $sale1 = '';
                if ($notify['Sale']) {
                    $sale1 = 'checked="checked"';
                }


                $ar_discount = $notify['discount'];

            }
        }
    }

}

$valid_formats = array("jpeg", "jpg", "png", "gif", "bmp","JPEG", "JPG", "PNG", "GIF", "BMP");

if (isset($_POST['submit1'])) {

    if (empty($_POST["article_name"])) {
        $errors['article_name'] = "Please Fill This Field!";

    } else {
        $article_name = $_POST["article_name"];
    }

    if (empty($_POST["categoryName"])) {
        $errors['categoryName'] = "Please Fill This Field!";

    } else {
        $category = $_POST["categoryName"];
    }

    if (empty($_POST["introspec"]))
    {
        $errors['introspec']="Please Fill This Field!";

    } else
    {
        $description1 = $_POST["introspec"];
    }
    if (empty($_POST["detailsspec"]))
    {
        $errors['detailsspec']="Please Fill This Field!";

    } else
    {
        $description2=$_POST["detailsspec"];
    }
    if (empty($_POST["specification"]))
    {
        $errors['specification'] = "Please Fill This Field!";

    } else
    {
        $description3 = $_POST["specification"];
    }




    $description=$description1."0_0".$description2."0_0".$description3;

/*
    if (empty($_POST["quantity"])) {
        $errors['quantity'] = "Please Fill This Field!";

    } else {
        $quantity = $_POST["quantity"];
    }
*/
    if (empty($_POST["brandnames"])) {
        $errors['brandnames'] = "Please Fill This Field!";

    } else {
        $bN = $_POST["brandnames"];
    }

    if (empty($_POST["datepicker"])) {
        $errors['date'] = "Please Fill This Field!";

    } else {
        $date = $_POST["datepicker"];
    }
/*    if (empty($_POST["colors"])) {
        $errors['colors'] = "Please Fill This Field!";

    } else {
        $color = $_POST["colors"];
    }
    */

    if (empty($_POST["ppp"])) {
        $errors['ppp'] = "Please Fill This Field!";
    } else {
        $ppp = $_POST["ppp"];
    }


    if (empty($_POST["tp"])) {
        if ($_POST["tp"] == "0") {
            $tp = $_POST["tp"];
        } else
            $errors['tp'] = "Please Fill This Field!";

    } else {
        $tp = $_POST["tp"];
    }


    $date = $_POST['datepicker'];
    // $date= new DateTime($d);
    $hotdeal = false;
    $bestsale = false;
    $sale = false;

    if (isset($_POST['hot_deal'])) {
        $hotdeal = true;
    }
    if (isset($_POST['bestseller'])) {
        $bestsale = true;
    }
    if (isset($_POST['sale'])) {
        $sale = true;
    }

$path1="../images/products";
    $art_name=$_POST['article_name'];
    $name = $_FILES['pic1']['name'];
    $size = $_FILES['pic1']['size'];

    if(strlen($name))
    {
        list($txt, $ext) = explode(".", $name);
        if(in_array($ext,$valid_formats))
        {
            if($size<(345*777))
            {

                $pic1 =$art_name."_".$pass."_"."_pic1_".".".$ext;
                $pic11 =$art_name."_".$pass."_"."_pic1_".".".$ext;
                $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
                $tmp = $_FILES['pic1']['tmp_name'];
                if(move_uploaded_file($tmp, $path1.$actual_image_name))
                {
                    if(file_exists ( $path1.$actual_image_name ))
                    {
                        rename($path1.$actual_image_name,$path1.$pic1);
                    }

                }
                else
                    $errors['pic1']="Upload Failed";
            }
            else
                $errors['pic1']="Image size grater than 1MB";
        }
        else
            $errors['pic1']="Invalid File Format";
    }

    else
        $errors['pic1']="Please Select Image File";



    $name2 = $_FILES['pic2']['name'];
    $size = $_FILES['pic2']['size'];
    if($name2!="")
    {
        if(strlen($name2))
        {
            list($txt, $ext) = explode(".", $name2);
            if(in_array($ext,$valid_formats))
            {
                if($size<(345*777))
                {
                    $pic2 =$art_name."_".$pass."_"."_pic2_".".".$ext;
                    $pic22 =$art_name."_".$pass."_"."_pic2_".".".$ext;
                    $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
                    $tmp = $_FILES['pic2']['tmp_name'];
                    if(move_uploaded_file($tmp, $path1.$actual_image_name))
                    {
                        if(file_exists ( $path1.$actual_image_name )){
                            rename($path1.$actual_image_name,$path1.$pic2);
                        }



                    }
                    else
                        $errors['pic2']="Upload Failed";
                }
                else
                    $errors['pic2']="Image size grater than 1MB";
            }
            else
                $errors['pic2']="Invalid File Format";
        }

        else{
            //$errors['pic2']="Please Select Image File";

        }
    }//end pic 2
    else{
        $pic2="";
    }

    $name3 = $_FILES['pic3']['name'];
    $size = $_FILES['pic3']['size'];
    if($name3!="")
    {

        if(strlen($name3))
        {
            list($txt, $ext) = explode(".", $name3);
            if(in_array($ext,$valid_formats))
            {
                if($size<(345*777))
                {
                    $pic3 =$art_name."_".$pass."_"."_pic3_".".".$ext;
                    $pic33 =$art_name."_".$pass."_"."_pic3_".".".$ext;
                    $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
                    $tmp = $_FILES['pic3']['tmp_name'];
                    if(move_uploaded_file($tmp, $path1.$actual_image_name))
                    {
                        if(file_exists ( $path1.$actual_image_name ))
                        {
                            rename($path1.$actual_image_name,$path1.$pic3);
                        }


                    }
                    else
                        $errors['pic3']="Upload Failed";
                }
                else
                    $errors['pic3']="Image size grater than specified";
            }
            else
                $errors['pic3']="Invalid File Format";
        }

        else{
            //$errors['pic3']="Please Select Image File";

        }
    }//end pic 3
    else{
        $pic3="";
    }

$p1="";
    if($pic1!=""){
        $p1=",picture1='".$pic1."'";;
    }else{
        $p1="";
    }

    $p2="";
    if($pic2!=""){
        $p2=",picture2='".$pic2."'";;
    }else{
        $p2="";
    }
    $p3="";
    if($pic3!=""){
        $p3=",picture3='".$pic3."'";;
    }else{
        $p3="";
    }


    if (empty($error)) {
      //  $sql = "UPDATE `article` SET `articleName`='$article_name' ,`Category`='$category' ,`brand`='$bN' ,`specification`='$description' ,`weekDeal`='$hotdeal',bestSeller='$bestsale' ,Sale='$sale',`price`='$ppp' ,`quantity`='$quantity',`discount`='$tp'  ,`date`='$date' ,`color`='$color' $p1 $p2 $p3  WHERE articleId='$ar_id'";
  $sql = "UPDATE `article` SET `articleName`='$article_name' ,`Category`='$category' ,`brand`='$bN' ,`specification`='$description' ,`weekDeal`='$hotdeal',bestSeller='$bestsale' ,Sale='$sale',`price`='$ppp' ,`discount`='$tp'  ,`date`='$date'  $p1 $p2 $p3  WHERE articleId='$ar_id'";

        $result = mysqli_query($CONNECTION, $sql);

        echo'<style type="text/css">
                #idalert {
                    visibility: visible;
                }
            </style>';



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
    <title>Update Article</title>
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

        <?php include "sideBar.php";?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Article
            <small></small>
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
              <div class="alert alert-success" role="alert" id="idalert" >Action successful</div>

              <div class="box-header with-border">
                  <h3 class="box-title">Update Article Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" id='updateform' enctype="multipart/form-data"  method="Post">
                  <div class=" box-body" >
                    <div class=" col-md-offset-1 form-group" >
                      <label for="name"    class="col-sm-2 control-label" >Article Name*</label>
                      <p class="help-block text-danger"></p>
					  <div class="col-sm-9">
                        <input type="text"   class="form-control" id="article_name" name="article_name" value='<?php echo $ar_name;?>' placeholder="" required >
						<span class="error"><font color="red"> <?php if(isset($errors['article_name'])) echo $errors['article_name'];?></font></span>

                      </div>
                    </div>
                      <div class="form-group">
                          <label for="category" class="col-sm-2 control-label">Category*</label>
                          <div class="col-sm-4">
                              <select class="form-control col-sm-9" name ="categoryName">
                                  <?php
                                  include("dbConnect.php");
                                  $query ="SELECT * FROM `category`";
                                  $result = mysqli_query($CONNECTION, $query);
                                  if($result) {
                                      if($result->num_rows > 0) {
                                          while ($notify = mysqli_fetch_assoc($result)) {
                                              $categoryName=$notify['categoryName'];
                                              if  ( $categoryName!=$ar_category){
                                                  ?>
                                                  <option selected='selected'>
                                                      <?php echo $categoryName;
                                                      ?>
                                                  </option>

                                              <?php }} }}?>

                                  <option selected='selected'><?php echo $ar_category; ?></option>
                              </select>
                          </div>




                          <label for="category" class="col-sm-1 control-label">Brand*</label>
                          <div class="col-sm-4">
                              <select class="form-control col-sm-9"name="brandnames"  >
                                  <?php
                                  include("dbConnect.php");
                                  $query1 ="SELECT brandName FROM brand";
                                  $result = mysqli_query($CONNECTION, $query1);
                                  if($result) {
                                      if($result->num_rows > 0) {
                                          while ($notify = mysqli_fetch_assoc($result)) {
                                              $brandName=$notify['brandName'];
                                              if  ( $brandName!=$ar_brandname){
                                              ?>
                                              <option selected='selected'>
                                                  <?php echo $brandName;
                                                  ?>
                                              </option>

                                          <?php }} }}?>

                                  <option selected='selected'><?php echo $ar_brandname; ?></option>


                              </select>
                          </div>
                      </div>
                  </div>

                    <div class="form-group">
                        <label for="specification" class="col-sm-2 control-label">Intro*</label>

                        <div class="col-sm-9">
                          <textarea rows="2" cols="20" type="text" class="form-control" name="introspec"
                                    placeholder="Introduction*" required><?php echo $intrduction;?> </textarea>
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['introspec'])) echo $errors['introspec']; ?></font></span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="specification" class="col-sm-2 control-label">Details*</label>

                        <div class="col-sm-9">
                          <textarea rows="3" cols="30" type="text" class="form-control" name="detailsspec"
                                    placeholder="Details*" required><?php echo $detail1;?> </textarea>
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['detailsspec'])) echo $errors['detailsspec']; ?></font></span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="specification" class="col-sm-2 control-label">Specification*</label>

                        <div class="col-sm-9">
                          <textarea rows="5" cols="50" type="text" class="form-control" id="todolist"
                                    name="specification" placeholder="Specification*" required> <?php echo $spec1;?></textarea>
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['specification'])) echo $errors['specification']; ?></font></span>
                        </div>

                    </div>
                      <div class="form-group">
                          <label for="small" class="col-sm-3 control-label">Week Deal</label>

                          <div class="col-sm-1 ">
                              <input type="checkbox" class=" checkbox" id="hotdeal" name="hot_deal" <?php echo $week_sale;?>  >
                          </div>

                          <label for="Medium" class="col-sm-2 control-label">Best Seller</label>
                          <div class="col-sm-1">
                              <input type="checkbox" class=" checkbox" id="bestseller" name="bestseller" <?php echo $bestsale;?> >
                          </div>

                          <label for="large" class="col-sm-2 control-label">Sale</label>
                          <div class="col-sm-1">
                              <input type="checkbox" class=" checkbox"  id="sale" name="sale" <?php echo $sale1;?> >
                          </div>

                                        </div>


                      
                           
			<!--
					<div class="form-group">
                      <label for="qty" class="col-sm-2 control-label" align="left">Total Quantity</label>
                      <div class="col-sm-4">
                        <input type="number" min="0" class="form-control" value='<?php //echo $ar_quantity;?>' onchange="count_total()" onkeyup="count_total()" id="quantity" name="quantity" align="left">
						<span class="error"><font color="red"> <?php// if(isset($errors['quantity'])) echo $errors['quantity'];?></font></span>
                      </div>
			
                    </div>
                    -->
                      
                      		<div class="form-group">
                      <label for="qty" class="col-sm-2 control-label" align="left">Price / Piece*</label>
                      <div class="col-sm-4">
                        <input type="number" min="0" class="form-control" value='<?php echo $ar_price;?>' onchange="total_price()"  id="ppp" name="ppp" align="left" placeholder="Price / Piece*"  >
						<span class="error"><font color="red"> <?php if(isset($errors['ppp'])) echo $errors['ppp'];?></font></span>
                      </div>
			
                      
                      <label for="qty" class="col-sm-2 control-label" align="left">Discount Percentage</label>
                      <div class="col-sm-3">
                        <input type="number" min="0" class="form-control" value='<?php echo $ar_discount;?>' onchange="total_price()" onkeyup="total_price()" id="tp1" name="tp" align="left"  >
						<span class="error"><font color="red"> <?php if(isset($errors['tp'])) echo $errors['tp'];?></font></span>
                      </div>
			
                      
                      
                    </div>
                      
                      <div class="form-group">
                      
                      		  <label for="to" class="col-sm-2 control-label" align="left">Date*</label>
                      <div class="col-sm-4">
                        <input type="text" id="datepicker" value='<?php echo $ar_date;?>' class="form-control" name="datepicker">
                          <span class="error"><font color="red"> <?php if(isset($errors['date'])) echo $errors['date'];?></font></span>
                      </div>
                      
                     </div>



                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Chose Color*</label>
                        <div class="col-sm-4">
                            <select class="form-control col-sm-9" id="ChoseColors">
                                <?php
                                include("dbConnect.php");
                                $query ="SELECT * FROM `color`";
                                $result = mysqli_query($CONNECTION, $query);
                                if($result) {
                                    if($result->num_rows > 0) {
                                        while ($notify = mysqli_fetch_assoc($result)) {
                                            $categoryName=$notify['colorName'];
                                            echo  "<span class='label label-danger'>$count</span>";
                                            ?>
                                            <option><?php echo $categoryName; ?></option>
                                        <?php } }}?>
                            </select>
                        </div>
                    </div>
<!--
                    <div class="form-group">
                        <label for="TIME IN" class="col-sm-2 control-label" align="left">Color*</label>
                        <div class="col-md-9">
                           <span class="col-sm-5">
                               <input type="text" readonly id="colorid"class="form-control" name="colors" value='<?php// echo $ar_color;?>' required />
                            </span >
                            <span class="error"><font color="red"> <?php //if(isset($errors['color'])) echo $errors['color'];?></font></span>


                            <img src="bootstrap/css/plus.png" width="30" onclick='f1()'>
                            <img src="bootstrap/css/close.png" width="30" onclick='f2()'>

                        </div>
                    </div>-->


                    <div class=" form-group">
                        <div class="col-md-4">
                            <input type="file"  name="pic1" id="pic1"  />
                            <span class="error"><font color="red"> </font></span>
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="pic2" id="pic2"  />
                            <span class="error"><font color="red"> </font></span>
                        </div>
                        <div class="col-md-4">
                            <input type="file"  name="pic3" id="pic3"  />
                            <span class="error"><font color="red"> </font></span>
                        </div>

                    </div>

                    <div class=" form-group">
                        <div class="col-md-4">
                            <img src='<?php echo $path.$picture1; ?>'width="50%" height="20%" border="1" />

                        </div>
                        <div class="col-md-4">
                            <img src='<?php echo $path.$picture2; ?>'width="50%" height="20%" border="1" />

                        </div>
                        <div class="col-md-4">
                            <img src='<?php echo $path.$picture3; ?>'width="50%" height="20%" border="1" />

                        </div>
                    </div>

              </div>
					</div><!-- /.box-body -->
						<div class='errorabcd' style='display:none'>Event Created</div>
				<div class="box-footer">
                    <button  name="submit1" data-toggle="tooltip" data-original-title='Submits'  id="submit1"class="btn btn-info pull-right" >Submit</button>
                  </div><!-- /.box-footer -->
                </form>	
              </div><!-- /.box -->
			  
            
              
              
              
              
              
              
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
<script type="text/javascript" src="../plugins/datepicker/bootstrap-datepicker.js"></script>    

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
      $("submit1").click(function(event){
    event.preventDefault();
});

</script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });


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