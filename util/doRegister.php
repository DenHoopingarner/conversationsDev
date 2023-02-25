<?php

$activeDate =  date("l, M d, Y");

header('Content-Type: application/json');

try {
     // Connect to the database
     require_once 'dbconfig.php';

     $varID = getGUID();
     $varFullName = $_POST["fullname"];
     $varEmail = $_POST["email"];
     $varPW = $_POST["password"];

     $varPW = password_hash($varPW, PASSWORD_BCRYPT);
     $varCreateDate = date("Y-m-d h:i:s");
     $varCode = getGUID();

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

          <p>Hello, $varFullName.  You must activate your account before you can log in.</p>
          <p><a href='http://conversations.denniehoopingarner.com/activateAccount.php?z=" . $varCode . "'>Click here to activate</a>.</p>
          ";
          require_once('_mailtemplate.php');
     }
     // Close the connection
     $dbh = null;
} catch (PDOException $e) {
     $myRes['err'] = 'errDB';
     $myRes['msg'] = $e->getMessage() . $varFullname;
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
