<?php
include_once('dbConnect.php');


function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$errors = array();

$pass = randomPassword();



if(isset($_POST['submit1'])) {
    $pic1;


    $valid_formats = array("jpeg", "jpg", "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP");
    // echo "<script type='text/javascript'>$('#submit1').click(function(event){event.preventDefault(); }); </script>";

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
    if ($_POST["iconN"] === '0') {
        $errors['iconN'] = "Please select the icon!";
    }else {
        $iconN = $_POST["iconN"];
    }
    $path = "../images/category/";
    $art_name = $_POST['article_name'];
    $name = $_FILES['pic1']['name'];
    $size = $_FILES['pic1']['size'];

    if (strlen($name)) {
        list($txt, $ext) = explode(".", $name);
        if (in_array($ext, $valid_formats)) {
            //	if($size<(345*777))
            //		{
            $pic1 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
            $pic11 = $art_name . "_" . $pass . "_" . "_pic1_" . "." . $ext;
            $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
            $tmp = $_FILES['pic1']['tmp_name'];
            if (move_uploaded_file($tmp, $path . $actual_image_name)) {
                if (file_exists($path . $actual_image_name)) {
                    rename($path . $actual_image_name, $path . $pic1);
                }
            } else
                $errors['pic1'] = "Upload Failed";
            //	}
            //	else
            //	$errors['pic1']="Image size grater than 1MB";
        } else
            $errors['pic1'] = "Invalid File Format";
    } else {
        $errors['pic1'] = "Please Select Image File";
    }



    if(empty($errors)){
        include_once('dbConnect.php');
        $sql = "INSERT INTO `mastercategory`(masterCategory,pic,description,piclogo) VALUES('$article_name','$pic1','$description','$iconN')";
        $result = mysqli_query($CONNECTION, $sql);
/*        echo '<style type="text/css">
                #idalert {
                    visibility: visible;
                }
            </style>';
  */      header("Refresh:0");

    }
}
?>

<style type="text/css">
    #idalert {
        visibility:hidden;
        margin-bottom: 0;
    }
</style>


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
    <title>Add Master Category</title>
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
<?php include "sideBar.php";?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add  Master Category
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
                        <h3 class="box-title">Add New Master Category Form</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id='insertform' enctype="multipart/form-data"  method="Post">
                        <div class=" box-body" >


                            <div class=" col-md-offset-1 form-group" >
                                <label for="name"    class="col-sm-2 control-label" >Master Category Name*</label>
                                <p class="help-block text-danger"></p>


                                <div class="col-sm-9">
                                    <input type="text"   class="form-control" id="article_name1" name="article_name" placeholder="" required >
                                    <span class="error"><font color="red"> <?php if(isset($errors['article_name'])) echo $errors['article_name'];?></font></span>
                                </div>
                            </div>
                            <div class=" col-md-offset-1 form-group" >
                                <label for="name"    class="col-sm-2 control-label" >description*</label>
                                <p class="help-block text-danger"></p>


                                <div class="col-sm-9">
                                    <input type="textbox"   class="form-control" id="description1" name="description" placeholder="" style="height: 100px" >
                                    <span class="error"><font color="red"> <?php if(isset($errors['description'])) echo $errors['description'];?></font></span>
                                </div>
                        </div>
                            <div class=" col-md-offset-1 form-group" >
                                <label for="qty" class="col-sm-2 control-label" align="left">Choose Picture</label>

                                <div class="col-sm-offset-2">
                                    <input type="file" class="col-sm-8 control-label" name="pic1" id="pic1" >
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['pic1'])) echo $errors['pic1']; ?></font></span>
                                </div>
                            </div>






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


                                        <?php
                                        $str = "fa-amazon fa-ambulance fa-anchor fa-android fa-angellist fa-angle-double-down fa-angle-double-left fa-angle-double-right fa-angle-double-up fa-angle-down fa-angle-left fa-angle-right fa-angle-up fa-apple fa-archive fa-area-chart fa-arrow-circle-down fa-arrow-circle-left fa-arrow-circle-o-down fa-arrow-circle-o-left fa-arrow-circle-o-right fa-arrow-circle-o-up fa-arrow-circle-right fa-arrow-circle-up fa-arrow-down fa-arrow-left fa-arrow-right fa-arrow-up fa-arrows fa-arrows-alt fa-arrows-h fa-arrows-v fa-asterisk fa-at fa-automobile fa-backward fa-balance-scale fa-ban fa-bank fa-bar-chart fa-bar-chart-o fa-barcode fa-bars fa-battery-0 fa-battery-1 fa-battery-2 fa-battery-3 fa-battery-4 fa-battery-empty fa-battery-full fa-battery-half fa-battery-quarter fa-battery-three-quarters fa-bed fa-beer fa-behance fa-behance-square fa-bell fa-bell-o fa-bell-slash fa-bell-slash-o fa-bicycle fa-binoculars fa-birthday-cake fa-bitbucket fa-bitbucket-square fa-bitcoin fa-black-tie fa-bluetooth fa-bluetooth-b fa-bold fa-bolt fa-bomb fa-book fa-bookmark fa-bookmark-o fa-briefcase fa-btc fa-bug fa-building fa-building-o fa-bullhorn fa-bullseye fa-bus fa-buysellads fa-cab fa-calculator fa-calendar fa-calendar-check-o fa-calendar-minus-o fa-calendar-o fa-calendar-plus-o fa-calendar-times-o fa-camera fa-camera-retro fa-car fa-caret-down fa-caret-left fa-caret-right fa-caret-square-o-down fa-caret-square-o-left fa-caret-square-o-right fa-caret-square-o-up fa-caret-up fa-cart-arrow-down fa-cart-plus fa-cc fa-cc-amex fa-cc-diners-club fa-cc-discover fa-cc-jcb fa-cc-mastercard fa-cc-paypal fa-cc-stripe fa-cc-visa fa-certificate fa-chain fa-chain-broken fa-check fa-check-circle fa-check-circle-o fa-check-square fa-check-square-o fa-chevron-circle-down fa-chevron-circle-left fa-chevron-circle-right fa-chevron-circle-up fa-chevron-down fa-chevron-left fa-chevron-right fa-chevron-up fa-child fa-chrome fa-circle fa-circle-o fa-circle-o-notch fa-circle-thin fa-clipboard fa-clock-o fa-clone fa-close fa-cloud fa-cloud-download fa-cloud-upload fa-cny fa-code fa-code-fork fa-codepen fa-codiepie fa-coffee fa-cog fa-cogs fa-columns fa-comment fa-comment-o fa-commenting fa-commenting-o fa-comments fa-comments-o fa-compass fa-compress fa-connectdevelop fa-contao fa-copy fa-copyright fa-creative-commons fa-credit-card fa-credit-card-alt fa-crop fa-crosshairs fa-css3 fa-cube fa-cubes fa-cut fa-cutlery fa-dashboard fa-dashcube fa-database fa-dedent fa-delicious fa-desktop fa-deviantart fa-diamond fa-digg fa-dollar fa-dot-circle-o fa-download fa-dribbble fa-dropbox fa-drupal fa-edge fa-edit fa-eject fa-ellipsis-h fa-ellipsis-v fa-empire fa-envelope fa-envelope-o fa-envelope-square fa-eraser fa-eur fa-euro fa-exchange fa-exclamation fa-exclamation-circle fa-exclamation-triangle fa-expand fa-expeditedssl fa-external-link fa-external-link-square fa-eye fa-eye-slash fa-eyedropper fa-facebook fa-facebook-f fa-facebook-official fa-facebook-square fa-fast-backward fa-fast-forward fa-fax fa-feed fa-female fa-fighter-jet fa-file fa-file-archive-o fa-file-audio-o fa-file-code-o fa-file-excel-o fa-file-image-o fa-file-movie-o fa-file-o fa-file-pdf-o fa-file-photo-o fa-file-picture-o fa-file-powerpoint-o fa-file-sound-o fa-file-text fa-file-text-o fa-file-video-o fa-file-word-o fa-file-zip-o fa-files-o fa-film fa-filter fa-fire fa-fire-extinguisher fa-firefox fa-flag fa-flag-checkered fa-flag-o fa-flash fa-flask fa-flickr fa-floppy-o fa-folder fa-folder-o fa-folder-open fa-folder-open-o fa-font fa-fonticons fa-fort-awesome fa-forumbee fa-forward fa-foursquare fa-frown-o fa-futbol-o fa-gamepad fa-gavel fa-gbp fa-ge fa-gear fa-gears fa-genderless fa-get-pocket fa-gg fa-gg-circle fa-gift fa-git fa-git-square fa-github fa-github-alt fa-github-square fa-gittip fa-glass fa-globe fa-google fa-google-plus fa-google-plus-square fa-google-wallet fa-graduation-cap fa-gratipay fa-group fa-h-square fa-hacker-news fa-hand-grab-o fa-hand-lizard-o fa-hand-o-down fa-hand-o-left fa-hand-o-right fa-hand-o-up fa-hand-paper-o fa-hand-peace-o fa-hand-pointer-o fa-hand-rock-o fa-hand-scissors-o fa-hand-spock-o fa-hand-stop-o fa-hashtag fa-hdd-o fa-header fa-headphones fa-heart fa-heart-o fa-heartbeat fa-history fa-home fa-hospital-o fa-hotel fa-hourglass fa-hourglass-1 fa-hourglass-2 fa-hourglass-3 fa-hourglass-end fa-hourglass-half fa-hourglass-o fa-hourglass-start fa-houzz fa-html5 fa-i-cursor fa-ils fa-image fa-inbox fa-indent fa-industry fa-info fa-info-circle fa-inr fa-instagram fa-institution fa-internet-explorer fa-intersex fa-ioxhost fa-italic fa-joomla fa-jpy fa-jsfiddle fa-key fa-keyboard-o fa-krw fa-language fa-laptop fa-lastfm fa-lastfm-square fa-leaf fa-leanpub fa-legal fa-lemon-o fa-level-down fa-level-up fa-life-bouy fa-life-buoy fa-life-ring fa-life-saver fa-lightbulb-o fa-line-chart fa-link fa-linkedin fa-linkedin-square fa-linux fa-list fa-list-alt fa-list-ol fa-list-ul fa-location-arrow fa-lock fa-long-arrow-down fa-long-arrow-left fa-long-arrow-right fa-long-arrow-up fa-magic fa-magnet fa-mail-forward fa-mail-reply fa-mail-reply-all fa-male fa-map fa-map-marker fa-map-o fa-map-pin fa-map-signs fa-mars fa-mars-double fa-mars-stroke fa-mars-stroke-h fa-mars-stroke-v fa-maxcdn fa-meanpath fa-medium fa-medkit fa-meh-o fa-mercury fa-microphone fa-microphone-slash fa-minus fa-minus-circle fa-minus-square fa-minus-square-o fa-mixcloud fa-mobile fa-mobile-phone fa-modx fa-money fa-moon-o fa-mortar-board fa-motorcycle fa-mouse-pointer fa-music fa-navicon fa-neuter fa-newspaper-o fa-object-group fa-object-ungroup fa-odnoklassniki fa-odnoklassniki-square fa-opencart fa-openid fa-opera fa-optin-monster fa-outdent fa-pagelines fa-paint-brush fa-paper-plane fa-paper-plane-o fa-paperclip fa-paragraph fa-paste fa-pause fa-pause-circle fa-pause-circle-o fa-paw fa-paypal fa-pencil fa-pencil-square fa-pencil-square-o fa-percent fa-phone fa-phone-square fa-photo fa-picture-o fa-pie-chart fa-pied-piper fa-pied-piper-alt fa-pinterest fa-pinterest-p fa-pinterest-square fa-plane fa-play fa-play-circle fa-play-circle-o fa-plug fa-plus fa-plus-circle fa-plus-square fa-plus-square-o fa-power-off fa-print fa-product-hunt fa-puzzle-piece fa-qq fa-qrcode fa-question fa-question-circle fa-quote-left fa-quote-right fa-ra fa-random fa-rebel fa-recycle fa-reddit fa-reddit-alien fa-reddit-square fa-refresh fa-registered fa-remove fa-renren fa-reorder fa-repeat fa-reply fa-reply-all fa-retweet fa-rmb fa-road fa-rocket fa-rotate-left fa-rotate-right fa-rouble fa-rss fa-rss-square fa-rub fa-ruble fa-rupee fa-safari fa-save fa-scissors fa-scribd fa-search fa-search-minus fa-search-plus fa-sellsy fa-send fa-send-o fa-server fa-share fa-share-alt fa-share-alt-square fa-share-square fa-share-square-o fa-shekel fa-sheqel fa-shield fa-ship fa-shirtsinbulk fa-shopping-bag fa-shopping-basket fa-shopping-cart fa-sign-in fa-sign-out fa-signal fa-simplybuilt fa-sitemap fa-skyatlas fa-skype fa-slack fa-sliders fa-slideshare fa-smile-o fa-soccer-ball-o fa-sort fa-sort-alpha-asc fa-sort-alpha-desc fa-sort-amount-asc fa-sort-amount-desc fa-sort-asc fa-sort-desc fa-sort-down fa-sort-numeric-asc fa-sort-numeric-desc fa-sort-up fa-soundcloud fa-space-shuttle fa-spinner fa-spoon fa-spotify fa-square fa-square-o fa-stack-exchange fa-stack-overflow fa-star fa-star-half fa-star-half-empty fa-star-half-full fa-star-half-o fa-star-o fa-steam fa-steam-square fa-step-backward fa-step-forward fa-stethoscope fa-sticky-note fa-sticky-note-o fa-stop fa-stop-circle fa-stop-circle-o fa-street-view fa-strikethrough fa-stumbleupon fa-stumbleupon-circle fa-subscript fa-subway fa-suitcase fa-sun-o fa-superscript fa-support fa-table fa-tablet fa-tachometer fa-tag fa-tags fa-tasks fa-taxi fa-television fa-tencent-weibo fa-terminal fa-text-height fa-text-width fa-th fa-th-large fa-th-list fa-thumb-tack fa-thumbs-down fa-thumbs-o-down fa-thumbs-o-up fa-thumbs-up fa-ticket fa-times fa-times-circle fa-times-circle-o fa-tint fa-toggle-down fa-toggle-left fa-toggle-off fa-toggle-on fa-toggle-right fa-toggle-up fa-trademark fa-train fa-transgender fa-transgender-alt fa-trash fa-trash-o fa-tree fa-trello fa-tripadvisor fa-trophy fa-truck fa-try fa-tty fa-tumblr fa-tumblr-square fa-turkish-lira fa-tv fa-twitch fa-twitter fa-twitter-square fa-umbrella fa-underline fa-undo fa-university fa-unlink fa-unlock fa-unlock-alt fa-unsorted fa-upload fa-usb fa-usd fa-user fa-user-md fa-user-plus fa-user-secret fa-user-times fa-users fa-venus fa-venus-double fa-venus-mars fa-viacoin fa-video-camera fa-vimeo fa-vimeo-square fa-vine fa-vk fa-volume-down fa-volume-off fa-volume-up fa-warning fa-wechat fa-weibo fa-weixin fa-whatsapp fa-wheelchair fa-wifi fa-wikipedia-w fa-windows fa-won fa-wordpress fa-wrench fa-xing fa-xing-square fa-y-combinator fa-y-combinator-square fa-yahoo fa-yc fa-yc-square fa-yelp fa-yen fa-youtube fa-youtube-play fa-youtube-square";
                                        ?>
                                        <div>
                                            <br/>
                                            <div class="">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <label id="iconName" name="iconName">Choose an icon from the list below: </label>
                                                    <input type="hidden" name="iconN" id="iconN" value="0">
                                                </div>
                                                <div class="col-md-3 col-md-offset-2">
                                                    <i class="fa fa-warning fa-3x" id="mainPic"></i>
                                                </div>
                                                <br/>

                                                <br/>
                                                <br/>
                                            </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <?php $array = explode(" ",$str);
                                                        $array_length = count($array);
                                                        $i = 0;
                                                        ?>
                                                        <?php
                                                        while($i < $array_length){
                                                            echo "<a href='#' id='pic'><i id='pic1$i' onclick='changePic($i)' class='fa $array[$i] fa-lg'></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
                                                            $i++;
                                                        }//end while loop ?>
                                                    </div>
                                                </div>

                                                <br/>
                                                <br/><br/>
                                            <br/>
                                        </div>

                                        <div class=" col-md-offset-1 form-group" >
                                            <div class="col-sm-offset-2">
                          <span class="error"><font
                                  color="red"> <?php if (isset($errors['iconN'])) echo $errors['iconN']; ?></font></span>
                                            </div>
                                        </div>

                                    </div><!-- /.col -->
                            </section><!-- /.content -->








            </div><!-- /.box-body -->
            <div class='errorabcd' style='display:none'>Event Created</div>
            <div class="box-footer">
                <button  name="submit1" " data-toggle="tooltip" data-original-title='Submits'  id="submit1"class="btn btn-info pull-right" >Submit</button>
            </div><!-- /.box-footer -->
                    </form>

                </div>



            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Category Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php
                    $query = "SELECT * FROM mastercategory";
                    $result = mysqli_query($CONNECTION, $query);
                    if($result) {
                        if($result->num_rows > 0) {
                            while ($member = mysqli_fetch_assoc($result)) {
                                $category=$member['masterCategory'];
                                $status=$member['status'];
                                if($status)
                                    $stat="<span class='label label-info'>active</span>";
                                    else
                                        $stat="<span class='label label-danger'>inactive</span>";

                                echo "<tr>".

                                    "<td> {$member['masterCategory']} </td>".
                                    "<td align='right'>".
                                    "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='' title='' onclick='newtab(this)'  data-original-title='{$member['masterCategory']}' data-user-id={$member['masterCategory']}><i class='fa fa-refresh'></i></button>&nbsp;".
                                    "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='' title='' onclick='newcat(this)'  data-original-title='{$member['masterCategory']}' data-user-id={$member['masterCategory']}><i class='fa fa-plus'></i></button>&nbsp;".
                                    "</td>".
                                    "<td> $stat </td>".
                                    "</tr>";
                            }
                        }
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Category Name</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
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
        url='updateCategory.php?q='+userid;
        window.open (url,'_self',false)
    }

    function newcat(id){
        userid=$(id).data("original-title");


        // document.getElementById("article_name1").value = userid;
        url='addsubcat.php?q='+userid;
        window.open (url,'_self',false)
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


    function changePic(id)
    {
        var imageSrc = document.getElementById("pic1" + id).className;
        var label = document.getElementById("iconName");
        label.innerHTML = imageSrc;
        document.getElementById("iconN").value = imageSrc;
        var mainPicture = document.getElementById("mainPic");
        imageSrc = imageSrc + " fa-3x";
        mainPicture.className = imageSrc;
        var savedPic = document.getElementById("savedIcon");
        savedPic.innerHTML = imageSrc;

    }



</script>
</body>
</html>