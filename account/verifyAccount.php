<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/css/main.css">
     <link rel="stylesheet" href="/css/register.css">
     <link rel="stylesheet" href="/res/fontawesome/css/all.min.css">
     <script src="/js/verifyAccount.js"></script>
     <title>Verify Your Account</title>
</head>

<body>
     
     <form class="form" id="form">
          <h2><i class="fa fa-user"></i> Verify your account:</h2>
          <div class="form-control">
               <label for="email">Email Address</label>
               <input type="text" id="email" placeholder="Your email address">
               <small>Error message</small>
          </div>
          <div class="form-control">
               <label for="code">Verification Code</label>
               <input type="text" id="code" placeholder="Your verification code">
               <small>Error message</small>
          </div>
          <p class="formButton" id="submitBtn">Send</p>
          <p class="formButton" id="cancelBtn">Cancel</p>
     </form>

</body>

</html>