<?php
session_start();
header('Content-Type: application/json');


try {
     // Connect to the database
     require_once 'dbconfig.php';

     $varEmail = $_POST["email"];

     $dbh = new PDO($dsn, $username, $password);

     // Is the email address already in the database?
     $sql = 'SELECT id, fullname FROM users WHERE email = :varEmail';
     $stmt = $dbh->prepare($sql);
     $stmt->bindValue(':varEmail', $varEmail, PDO::PARAM_STR);
     $stmt->execute();
     $rows = $stmt->fetchAll();

     if (count($rows) == 1) {
          $myRes['res'] = 'success';

          $myRes['userID'] = $rows[0]["id"];
          $myRes["fullname"] = $rows[0]["fullname"];
          $myRes['msg'] = "you're in the database, " . $rows[0]["fullname"] . ".";

          // generate a reset code
          $resetCode = getGUID();
          // Insert the reset code into the db
          $sql = 'UPDATE users SET active = "R", code = ' . $resetCode . ' WHERE email = "' . $varEmail . '"';
          $stmt = $dbh->prepare($sql);
          $stmt->execute();

          // send an email with the reset code
          // Send confirmation email
          $emailTo = $varEmail;
          $emailName = $varFullName;
          $emailSubject = 'Verify your Conversations registration';
          $emailSuccessMsg = 'email sent successfully';
          $emailFailMsg = 'email sent successfully';
          $emailFrom = 'An Email System';

          $emailBody =
               "
          <h3>Thanks for registering with Conversations.</h3>

          <p>Hello, $varFullName.  You must verify your account before you can log in.</p>
          <p><a href='http://conversations.denniehoopingarner.com/checkVerify.php?z=" . $varCode . "'>Click here to verify</a></p>
          ";
          require_once('_mailtemplate.php');


          // redirect to the sent page
     } else {
          $myRes['res'] = 'errEmail';
          $myRes['msg'] = 'No user with that email.';
     }


     // Close the connection
     $dbh = null;
} catch (PDOException $e) {
     $myRes['res'] = 'db error';
     $myRes['msg'] = $e->getMessage() . $varEmail;
}

$myJSON = json_encode($myRes);
echo $myJSON;


function getGUID()
{
     if (function_exists('com_create_guid')) {
          return '44' . com_create_guid();
     } else {
          mt_srand((float)microtime() * 10000); //optional for php 4.2.0 and up.
          $charid = strtoupper(md5(uniqid(rand(), true)));
          $hyphen = chr(45); // "-"
          $uuid = chr(123) // "{"
               . substr($charid, 0, 8) . $hyphen
               . substr($charid, 8, 4) . $hyphen
               . substr($charid, 12, 4) . $hyphen
               . substr($charid, 16, 4) . $hyphen
               . substr($charid, 20, 12)
               . chr(125); // "}"
          //return $uuid;
          $uuid =
               substr($charid, 0, 8) . $hyphen
               . substr($charid, 8, 4) . $hyphen
               . substr($charid, 12, 4) . $hyphen
               . substr($charid, 16, 4) . $hyphen
               . substr($charid, 20, 12);

          return $uuid;
     }
}
