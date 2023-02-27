<?php
session_start();
header('Content-Type: application/json');

try {
     // Connect to the database
     require_once 'dbconfig.php';

     $varEmail = $_POST["email"];
     $varPW = $_POST["password"];
     $varLoginDate = date("Y-m-d h:i:s");
     $varLoginIP =  $_SERVER['REMOTE_ADDR'];

     $dbh = new PDO($dsn, $username, $password);

     // Is the email address already in the database?
     $sql = 'SELECT id, pw, fullname FROM users WHERE email = :varEmail';
     $stmt = $dbh->prepare($sql);
     $stmt->bindValue(':varEmail', $varEmail, PDO::PARAM_STR);
     $stmt->execute();
     $rows = $stmt->fetchAll();

     if (count($rows) == 1) {
          // now check to see if the password matches
          if (password_verify($varPW, $rows[0]['pw'])) {
               $_SESSION["userID"] = $rows[0]["id"];
               $_SESSION["fullname"] = $rows[0]["fullname"];
               $myRes['res'] = 'success';

               $myRes['userID'] = $rows[0]["id"];
               $myRes["fullname"] = $rows[0]["fullname"];

               $myRes['rowCount'] = count($rows);

               // log this login into the loginTracker
               $sql = "INSERT INTO loginTracker (userID,loginDate, loginIP) VALUES (:varID, :varLoginDate, :varLoginIP )";
               $stmt = $dbh->prepare($sql);
               $stmt->bindValue(':varID', $rows[0]["id"]);
               $stmt->bindValue(':varLoginIP', $varLoginIP);
               $stmt->bindValue(':varLoginDate', $varLoginDate);
               $stmt->execute();
          } else {
               $myRes['res'] = 'errPW';
               $myRes['msg'] = 'Password incorrect';
          }
     } else {
          $myRes['res'] = 'errEmail';
          $myRes['msg'] = 'No account under that email address.';
     }


     // Close the connection
     $dbh = null;
} catch (PDOException $e) {
     $myRes['res'] = 'fundamental error';
     $myRes['msg'] = $e->getMessage() . $varEmail;
}

$myJSON = json_encode($myRes);
echo $myJSON;
