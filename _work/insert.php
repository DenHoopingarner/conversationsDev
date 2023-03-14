<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/main.css">
     <title>Document</title>
</head>

<body>

     <div class="box1">
          <?php
/*
          try {
               // Connect to the database
               require_once 'dbconfig.php';

               $varID = getGUID();
               $varEmail = 'test4@hooha.com';
               $varPW = 'my weak password';
               $varPW = password_hash($varPW, PASSWORD_BCRYPT);
               $varFullName = 'Test Four';
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
                    echo ('already have a record with this email address');
               } else {

                    // Insert data into the database
                    $sql = "INSERT INTO users (id, email, pw, fullname, createDate, code) VALUES (:varID, :varEmail, :varPW, :varFullName, :varCreateDate, :varCode )";
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':varID', $varID);
                    $stmt->bindParam(':varEmail', $varEmail);
                    $stmt->bindParam(':varPW', $varPW);
                    $stmt->bindParam(':varFullName', $varFullName);
                    $stmt->bindParam(':varCreateDate', $varCreateDate);
                    $stmt->bindParam(':varCode', $varCode);
                    $stmt->execute();

                    echo 'done!';
               }
               // Close the connection
               $dbh = null;
          } catch (PDOException $e) {
               echo ($e->getMessage());
          }


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
*/
          ?>

     </div>
</body>

</html>