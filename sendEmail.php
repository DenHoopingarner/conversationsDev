<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Email Test</title>
</head>

<body>
     <?php
     $emailTo = 'denniehoopingarner@icloud.com';
     $emailName = 'Den the Man';
     $emailSubject = 'A cheezy email subject line 2';
     $emailSuccessMsg = 'email sent successfully';
     $emailFailMsg = 'email sent successfully';
     $emailFrom = 'An Email System';

     $emailBody = '
     <h1>Hi.</h1>
     <h3>This is an email</h3>
     <ol>
     <li>One</li>
     <li>Two</li>
     <li>Three</li>

     </ol>
     ';

     require_once('util/_mailtemplate.php');



     ?>

</body>

</html>