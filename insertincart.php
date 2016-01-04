<?php


include('session.php');
//session_start();
$userId= $_SESSION['loginId'];
echo $userId;
if(isset($_POST['submit']))
{
    if (empty($_POST['payment-radio'])  ) {
        header("location: shopping_cart.php");
    }
    else{

        $trackingNo=$_GET['trackingNo'];
        $totalAmount=$_GET['overallprice'];

        $paymentStatus= "";
        $paymentType=$_POST["payment-radio"];
        $shippingType=$_POST["shipment-radio"];
        //     echo $shippingType;

        /*
                $emailaddressbillto=$_POST['emailAddress'];
                $namebillto=$_POST['namebill'];
                $addressbillto=$_POST['addressbill'];
                $zipbillto=$_POST['zipbill'];
                $citybillto=$_POST['citybill'];
                $countrybillto=$_POST['Countrybill'];
                $contactbillto=$_POST['contactbill'];

        */

       // $nameshipto=$_POST['nameship'];
        $addressshipto=$_POST['addressship'];
        // $zipshipto=$_POST['zipship'];
        $cityshipto=$_POST['Cityship'];
        $countryshipto=$_POST['Countryship'];
        $contactshipto=$_POST['contactship'];
        $importantMsg=$_POST['importantMsg'];
        $emailclientto=$_POST['Emailship'];
        /* if ($paymentType == 'COD') {


          //   header("location: index.php");
         }
         else if ($paymentType == 'BT') {



         }*/
        //      echo $paymentType;
        /*    $sql = "select ordertracking.trackingNo from ordertracking inner join orderdetails on orderdetails.trackingNo=ordertracking.trackingNo and userId='$userId' and status='In Progress'";
    $result=mysqli_query($connection,$sql);
    $table_record=mysqli_fetch_array($result);
        $trackingNo=$table_record['trackingNo'];
      //  echo $trackingNo;
    */
        /*       $sql ="INSERT INTO billingaddress (Email, name, address, zip,city, country,phoneNo, trackingNo) VALUES ('$emailaddressbillto', '$namebillto','$addressbillto','$zipbillto', '$citybillto', '$countrybillto', '$contactbillto', '$trackingNo' )";
               if ($connection->query($sql) === TRUE) {
        //           echo "New record created successfully";
               } else {
          //         echo "Error: " . $sql . "<br>" . $connection->error;
               }
       */

        $sql ="INSERT INTO shippingadress ( address,city, country,phoneNo, trackingNo,importantMsg) VALUES ( '$addressshipto','$cityshipto', '$countryshipto', '$contactshipto', '$trackingNo','$importantMsg' )";
        $result=mysqli_query($connection,$sql);






        $dateTime=date("Y-m-d H:i:s");


        $sql="update ordertracking set paymentMethod='$paymentType', totalAmount='$totalAmount',shippmentMethod='$shippingType', status='Confirmed',ordertracking.date='$dateTime'  where trackingNo='$trackingNo' ";
        $result=mysqli_query($connection,$sql);

        $sql ="INSERT INTO notifications (status,notificationDate,trackingId) VALUES ( 'unread','$dateTime' , '$trackingNo')";
        if ($connection->query($sql) === TRUE) {
            //      echo "New record created successfullyhehehehe";
        } else {
            //    echo "Error: " . $sql . "<br>" . $connection->error;
        }

        $_SESSION['trackingNo']=$trackingNo;

        /*
                //update quantity in article
               $sql1="select orderdetails.quantity,orderdetails.articleId from orderdetails inner join article on orderdetails.articleId=article.articleId and orderdetails.trackingNo='$trackingNo'  ";
                $result1=mysqli_query($connection,$sql1);

                while($table_record=mysqli_fetch_array($result1)){
                    $quantity =$table_record['quantity'];
                    $articleId =$table_record['articleId'];

                    $sqlquantityarticle="select quantity from article where articleID='$articleId' ";
                    $resultquantityarticle=mysqli_query($connection,$sqlquantityarticle);

                    $table_record=mysqli_fetch_array($resultquantityarticle);
                        $quantityarticle =$table_record['quantity'];

        $quantity=$quantityarticle-$quantity;


                        $sql2="update article set quantity= '$quantity' where articleId='$articleId'  ";
                $result=mysqli_query($connection,$sql2);
                }
        */




        include ('connectdb.php');


        $sub='StoreOnline.pk | New orderPlace';
        $message="";
        require 'PHPMailer-master/PHPMailerAutoload.php';
        $emailClient=$_SESSION['loginUser'];


//echo $emailClient;
        /*
                $query ="SELECT orderdetails.articleId,orderdetails.quantity, orderdetails.totalPrice from orderdetails  where trackingNo='$trackingNo'";
                $result = mysqli_query($connection, $query);
                while($table_record=mysqli_fetch_array($result)){
                    $articleId=$table_record['articleId'];
                    $quantity=$table_record['quantity'];
                    $totalPrice=$table_record['totalPrice'];
                }


                $x=0;
                while($table_record=mysqli_fetch_array($result)){
                    $arr[$x]=array($table_record['articleId']);
                    $x++;
                    $arr[$x]=array($table_record['quantity']);
                    $x++;
                    $arr[$x]=array($table_record['totalPrice']);
                    $x++;
                }

        $i=0;
                foreach($arr as $x => $x_value) {
                  //  echo "Key=" . $x . ", Value=" . $x_value;

                }

        */
        $sql="select ordertracking.date as dateOrder, paymentMethod,totalAmount,shippmentMethod from ordertracking where trackingNo= '$trackingNo'";
        $result=mysqli_query($connection,$sql);
        $table_record=mysqli_fetch_array($result);
        $date = $table_record['dateOrder'];
        $paymentMethod = $table_record['paymentMethod'];
        if($paymentMethod=="COD")
            $paymentMethod="Cash on Delivery";
        else
            $paymentMethod="Bank Transfer";
        $shippingMethod = $table_record['shippmentMethod'];
        if ($shippingMethod=="freeshipping")
            $shippingMethod="Free Shipping";
        else
            $shippingMethod="Ship rate per item";
        $totalAmount=$table_record['totalAmount'];


        $sql="select ordertracking.date as dateOrder, paymentMethod,totalAmount,shippmentMethod from ordertracking where trackingNo= '$trackingNo'";
        $result=mysqli_query($connection,$sql);
        $table_record=mysqli_fetch_array($result);
        /* $query ="SELECT firstName from userinfo where emailAddress='$emailClient'";
$result = mysqli_query($connection, $query);
    $notify = mysqli_fetch_assoc($result);
     */ $body= "<a href='www.storeonline.pk'><img src=\"cid:logoimg\" width='300px' /></a>"."<br><br>Dear ".$emailclientto.':<br><br>'.
            "<table border='3' bgcolor='#d3d3d3' width='700px' height='100px' cellspacing='5' cellpadding='5'><tr><td>Your total Amount to be paid is</td>"."<td> Rs.".$totalAmount."</td></tr>"."<tr><td>Date and Time </td><td>".$date.'</td></tr>'."<tr><td>Payment Method </td><td>".$paymentMethod.'</td></tr>'."<tr><td>Shipping Method </td><td>".$shippingMethod.'</td></tr>'.'</table>';


        $sql="select address,city,country,phoneNo,trackingNo,importantMsg from shippingadress where trackingNo= '$trackingNo'";
        $result=mysqli_query($connection,$sql);
        $table_record=mysqli_fetch_array($result);
        $address = $table_record['address'];
        $city=$table_record['city'];
        $country=$table_record['country'];
        $phoneNo=$table_record['phoneNo'];
        $trackingNo=$table_record['trackingNo'];
        $importantMsg=$table_record['importantMsg'];

        $body.="<br><br><strong>Shipping address Info:</strong>"."<br><br>";
        $body.="<table border='3' bgcolor='#d3d3d3' width='700px' height='100px' cellspacing='5' cellpadding='5'><tr><td>Tracking No</td>"."<td>".$trackingNo. "</td></tr><tr><td>Shipping Address</td>"."<td>".$address. "</td></tr>"."<tr><td>Contact No </td><td>".$phoneNo.'</td></tr>'."<tr><td>City </td><td>".$city.'</td></tr>'."<tr><td>Country </td><td>".$country.'</td></tr>'."<tr><td>Important Message from Client </td><td>".$importantMsg.'</td></tr></table>';




        $body.="<br><br><strong>Invoice:</strong>"."<br><br>";
        $body.='<table  border="3" bgcolor="#d3d3d3" width="700px" height="100px" cellspacing="5" cellpadding="5" ><tr><th style="width: 150px " >Product                                                         </th><th style="width: 100px"> Price                       </th><th style="width: 100px"> Discount                     </th><th style="width: 100px"> Quantity                 </th><th style="width: 100px"> Total Price                 </th></tr>';





        $sql = "SELECT orderdetails.articleId,orderdetails.quantity,orderdetails.totalPrice,price,articleName,trackingNo,article.discount FROM orderdetails inner join article on orderdetails.articleId=article.articleId and userId='$userId' and orderdetails.trackingNo='$trackingNo'";
        $result=mysqli_query($connection,$sql);

        while($table_record=mysqli_fetch_array($result)){
            $articleName = $table_record['articleName'];
            $price = $table_record['price'];
            $articleNo=$table_record['articleId'];
            $totalPrice=$table_record['totalPrice'];
            $quantity=$table_record['quantity'];

            $discount=$table_record['discount'];
            $overAllprice += $totalPrice;

            $body.="<tr><td>".$articleName."</td><td>"."Rs.".$price."</td><td>".$discount."%"."</td><td>".$quantity."</td><td>"."Rs.".$totalPrice."</td></tr>";

        }



        $body.= "<tr><td  border='0'></td><td border='0'></td><td  border='0'></td><th>"."Total Amount "."<td >Rs. ".$overAllprice."</th></tr></table>";
        $body.="<tr></tr><tr></tr><tr><td></td><th>"."Regards,".'<br>'."<a href='www.storeOnline.pk'>StoreOnline.pk</a></th></tr>";



        //$filepaths= 'C:/Users/MuazAhmad/Desktop/YPIP (OG-2)-5th Batch.pdf';

//$body= "Dear ".$notify["firstName"]." ".$notify["lastName"].",".'<br><br>'.$_POST["body"].'<br><br>'."Regards,".'<br><br>'."<a href='www.electroshop.pk'>ElectroShop.pk</a>";

        //       echo 'hello';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'techagentx@gmail.com';                 // SMTP username
        $mail->Password = 'muazahmad';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                   // TCP port to connect to
        $mail->From = 'techagentx@gmail.com';
        $mail->FromName = 'StoreOnline New Order Placed';
        $mail->addAddress($emailclientto);//Recipient //Name is optional
        $mail->AddBCC("techagentx@gmail.com", "New Order");
        $mail->IsHTML(true);
        $mail->AddEmbeddedImage('photo/electroshop-logo.png', 'logoimg');

        $mail->addReplyTo('techagentx@gmail.com', 'ElectroShop Admin');
        $mail->Subject = $sub;
        $mail->Body    = $body;

        if(!$mail->send()) {
            $message="0";
            // echo "Email has not been send";

        } else {
            $message="1";
            //  echo "Email has been send";
        }















        header("location: order_info.php");
    }

}
mysqli_close($connection); // Closing Connection

?>