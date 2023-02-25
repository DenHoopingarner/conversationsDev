<?php
session_start();

if (empty($_SESSION['userID'])) {
     header('location: index.php');
}

?>
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
     <h1>
          You should only see this if you're logged in,
          <?php
          echo $_SESSION['fullname'];
          ?>.
          <p>BTW, your user ID is <?php echo $_SESSION["userID"]; ?>.
               As if you should care. :-)
     </h1>
</body>

</html>