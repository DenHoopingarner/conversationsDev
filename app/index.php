<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/app/css/style.css">
     <title>App Test</title>
</head>

<body>

     <?php

     // die("url: " . $_GET["url"]);


     if ($_GET["url"] != 'index.php') {
          $myarr = explode('/', $_GET["url"]);
          // die(implode("~", $myarr));
          // die($myarr[0]);

          $myfile = $myarr[0] . '.php';
          if (file_exists($myfile)) {
               require_once $myfile;
               // echo 'ok';
          } else {
               // die('file error: ' . $myfile);
               die('
                    <p>Oops, a small problem occurred.  <a href="/app">Please try again</a></p>
               ');
          }
     } else {
          require_once 'indexDefault.php';
     }
     ?>


</body>

</html>