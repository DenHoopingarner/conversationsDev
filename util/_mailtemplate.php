<?php

if (!isset($toAddress)) $toAddress = 'denniehoopingarner@icloud.com';
if (!isset($toName)) $toName = 'Den Cloud';
if (!isset($my_subject)) $my_subject = 'Template Defaults';
if (!isset($my_body)) $my_body = '
<h2>You didn\'t tell me what to say!</h2>
<hr />
<h3>So I just made some stuff up</h3>';


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "tls";
$mail->Port = "587";

$mail->Username   = 'denconversations@gmail.com';
// actual Gmail account password is d3nc0nv3rs@+!0n5
$mail->Password   = 'cxfegijlzqxbarmg';
$mail->setFrom('denconversations@gmail.com', 'Conversations');


// $mail->addAddress('denniehoopingarner@icloud.com', 'Den Cloud');
$mail->addAddress($toAddress, $toName);
$mail->addReplyTo('denconversations@gmail.com', 'Conversations');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

//Attachments
// $mail->addAttachment('includes/cover.png');         //Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = $my_subject;
$mail->Body    = $my_body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if ($mail->send()) {
     echo 'Message has been sent';
} else {
     echo 'mail fail.';
}
$mail->smtpClose();
