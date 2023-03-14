<?php
header('Content-Type: application/json');

$varID = '1B5421C7-1341-B776-1D25-94246442C986';
$varPW = 'hooha';

require_once 'dbconfig.php';

$dbh = new PDO($dsn, $username, $password);

try {
     // Is the userID in the database?
     $sql = 'SELECT * FROM users WHERE code = :varID';
     $stmt = $dbh->prepare($sql);
     $stmt->bindValue(':varID', $varID, PDO::PARAM_STR);
     $stmt->execute();
     $rows = $stmt->fetchAll();
     // $res = $stmt->rowCount();
     if (count($rows) == 1) {
          $myRes['res'] = 'ok';
          $myRes['msg'] = 'This email address is already registered';
          $myRes["fullname"] = $rows[0]["fullname"];
          $myRes["pw"] = $rows[0]["pw"];
          if (password_verify($varPW, $rows[0]['pw'])) {
               $myRes['pwOK'] = 'Password OK';
          } else {
               $myRes['pwOK'] = 'Password FAIL';
          }
     } else {
          $myRes['res'] = 'errNoUser';
          $myRes['msg'] = 'No user with that id found';
     }
     // Close the connection
     $dbh = null;
} catch (PDOException $e) {
     $myRes['res'] = 'db error';
     $myRes['msg'] = $e->getMessage() . $varEmail;
}

$myJSON = json_encode($myRes);
echo $myJSON;
