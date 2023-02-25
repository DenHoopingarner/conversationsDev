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
     <?php
     $pw = "12345678";
     $pw1 = password_hash($pw, PASSWORD_BCRYPT);
     echo '<p>The plain-text password is ' . $pw . ', and the hashed version is ' . $pw1 . '</p>';

     if (password_verify($pw, $pw1)) {
          echo 'verified!';
     } else {
          echo 'unverified';
     }

     echo '<h3>' . date("Y-m-d h:i:s") . '</h3>';

     ?>
</body>

</html>