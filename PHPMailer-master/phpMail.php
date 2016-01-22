<?php
require 'PHPMailerAutoload.php';
                    $mail = new PHPMailer;

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'companymargarita9@gmail.com';                 // SMTP username
                    $mail->Password = 'margarita9';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    $mail->From = 'companymargarita9@gmail.com';
                    $mail->FromName = 'ElectroShop Newsletter';
                    $mail->addAddress('muazahmad24@yahoo.com');//Recipient //Name is optional
                    $mail->addReplyTo('companymargarita9@gmail.com', 'Moschino Admin');
                    $mail->isHTML(true);                                  // Set email format to HTML
$file = 'C:/Users/MuazAhmad/Desktop/YPIP (OG-2)-5th Batch.pdf';
$mail->addAttachment($file,'application/octet-stream');

                    $mail->Subject = 'Staff Account Invite';
                    $mail->Body    = 'Follow this Link to Create Your Account';

                    if(!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        echo 'Message has been sent';
                    }

