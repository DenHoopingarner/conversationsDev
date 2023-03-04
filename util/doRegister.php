<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$activeDate =  date("l, M d, Y");

header('Content-Type: application/json');

try {
     // Connect to the database
     require_once 'dbconfig.php';

     $varID = guidv4();
     $varFullName = $_POST["fullname"];
     $varEmail = $_POST["email"];
     $varPW = $_POST["password"];
     // $varFullName = 'Den State';
     // $varEmail = 'hoopingarnerds@state.gov';
     // $varPW = 'test';


     $varPW = password_hash($varPW, PASSWORD_BCRYPT);
     $varCreateDate = date("Y-m-d h:i:s");
     $varCode = guidv4();

     $dbh = new PDO($dsn, $username, $password);

     // Is the email address already in the database?
     $sql = 'SELECT * FROM users WHERE email = :varEmail';
     $stmt = $dbh->prepare($sql);
     $stmt->bindValue(':varEmail', $varEmail, PDO::PARAM_STR);
     $stmt->execute();
     $res = $stmt->rowCount();
     if ($res > 0) {
          $myRes['res'] = 'errEmail';
          $myRes['msg'] = 'This email address is already registered';
     } else {

          // Insert data into the database
          $sql = "INSERT INTO users (id, email, pw, fullname, createDate, code, active) VALUES (:varID, :varEmail, :varPW, :varFullName, :varCreateDate, :varCode, :varActive )";
          $stmt = $dbh->prepare($sql);
          $stmt->bindValue(':varID', $varID);
          $stmt->bindValue(':varEmail', $varEmail);
          $stmt->bindValue(':varPW', $varPW);
          $stmt->bindValue(':varFullName', $varFullName);
          $stmt->bindValue(':varCreateDate', $varCreateDate);
          $stmt->bindValue(':varCode', $varCode);
          $stmt->bindValue(':varActive', 'N');
          $stmt->execute();

          try {
               // Send confirmation email
               $emailTo = $varEmail;
               $emailName = $varFullName;
               $emailSubject = 'Verify your Conversations registration';
               $emailSuccessMsg = 'email sent successfully to ' . $varEmail;
               $emailFailMsg = 'email failed';
               $emailFrom = 'Conversations Email System';

               $emailBody =
                    "
               <h3>Thanks for registering with Conversations.</h3>

               <p>Hello, $varFullName.  You must activate your account before you can log in.</p>
               <p><a href='http://conversations.denniehoopingarner.com/activateAccount.php?z=" . $varCode . "'>Click here to activate</a>.</p>
               ";
               // require_once('../util/_mailtemplate.php') or die ('errEmailTemplate');



               require '../PHPMailer/src/Exception.php';
               require '../PHPMailer/src/PHPMailer.php';
               require '../PHPMailer/src/SMTP.php';

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
          } catch (Exception $e) {
               // Code that handles the exception
               $myRes['res'] = 'errEmailSend';
               // $myRes['msg'] = $e->getMessage();
               $myRes['msg'] = 'can not send the email';
          }
     }
     // Close the connection
     $dbh = null;
} catch (PDOException $e) {
     $myRes['res'] = 'errDB';
     $myRes['msg'] = $e->getMessage() . $varFullname;
}

$myJSON = json_encode($myRes);
echo $myJSON;


function guidv4()
{
     // Generate 16 bytes (128 bits) of random data or use your own implementation here
     $data = random_bytes(16);

     // Set the version to 0100
     $data[6] = chr(ord($data[6]) & 0x0f | 0x40);

     // Set the variant to 10
     $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

     // Output the GUID in the format {XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX}
     return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
