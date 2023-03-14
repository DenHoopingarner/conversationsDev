<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


global $fname, $lname, $resetKey, $emailaddress;

$emailaddress = 'denniehoopingarner@icloud.com';
$fname = 'Hoo';
$lname = 'Ha';
$activeDate =  date("l, M d, Y");

$emailSubject = "An email test for $fname at $activeDate";

$ConfirmationEmailBody = "

<p>Hello, <em>$fname $lname</em>.  This is just an email test.  <strong>It means nothing.</strong</p>

";

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
     $mail->setFrom('login@denniehoopingarner.com', 'Login System');          //This is the email your form sends From
     $mail->addAddress("$emailaddress", "$fname $lname");      // Add a recipient address

     //Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = $emailSubject;
     $mail->Body    =  $ConfirmationEmailBody;
     //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

     $mail->send();
     echo 'Registration was successful. Check your inbox for a confirmation email You must verify your email in order to continue.';
} catch (Exception $e) {

     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
}
