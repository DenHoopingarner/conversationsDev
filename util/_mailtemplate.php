<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

/*
$emailTo = 'denniehoopingarner@icloud.com';
$emailName = 'Den the Man';
$emailSubject = 'A cheezy email subject line';
$emailSuccessMsg = 'email sent successfully';
$emailFailMsg = 'email sent successfully';

$emailBody = '
<h1>Hi.</h1>
<h3>This is an email</h3>
';
*/

// global $fname, $lname, $resetKey, $emailaddress;

// $emailaddress = 'denniehoopingarner@icloud.com';
// $fname = 'Hoo';
// $lname = 'Ha';
// $activeDate =  date("l, M d, Y");

// $emailSubject = "An email test for $fname at $activeDate";

// $ConfirmationEmailBody = "

// <p>Hello, <em>$fname $lname</em>.  This is just an email test.  <strong>It means nothing.</strong</p>

// ";

$mail = new PHPMailer(true);                                        // Passing `true` enables exceptions
try {

     //Server settings
     $mail->SMTPDebug = 0;                                            // Enable verbose debug output
     $mail->isSMTP();                                                 // Set mailer to use SMTP
     $mail->Host = 'smtp.dreamhost.com';                              // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                                          // Enable SMTP authentication
     $mail->Username = 'login@denniehoopingarner.com';                // SMTP username
     $mail->Password = '1966 was a cheesy year';                      // SMTP password
     $mail->SMTPSecure = 'ssl';                                       // Enable SSL encryption, TLS also accepted with port 465
     $mail->Port = 465;                                               // TCP port to connect to

     //Recipients
     $mail->setFrom('login@denniehoopingarner.com', $emailFrom);          //This is the email your form sends From
     $mail->addAddress("$emailTo", "$emailName");      // Add a recipient address

     //Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = $emailSubject;
     $mail->Body    =  $emailBody;
     //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

     $mail->send();
     $myRes['res'] = 'success';
     $myRes['msg'] = $emailSuccessMsg;
} catch (Exception $e) {

     echo $emailFailMsg;
     echo $mail->ErrorInfo;
}
