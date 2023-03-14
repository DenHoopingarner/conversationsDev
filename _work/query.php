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
          <div class="queryBox">
               <?php
/*
               try {
                    // Connect to the database
                    require_once('dbconfig.php');

                    $dbh = new PDO($dsn, $username, $password);

                    // Query the database
                    $sql = 'SELECT * FROM users';

                    $res = $dbh->query($sql)->fetchAll();
                    foreach ($res as $row) {
                         echo '<div class="queryCell">' . $row['fullname'] . '</div>';
                         echo '<div class="queryCell">';
                         if (password_verify('my weak password', $row['pw'])) {
                              echo 'OK';
                         } else {
                              echo 'NG';
                         }
                         echo '</div>';
                    }

                    // Close the connection
                    $dbh = null;
               } catch (PDOException $e) {
                    echo ($e->getMessage());
               }
*/
               ?>
          </div>
     </div>
</body>

</html>