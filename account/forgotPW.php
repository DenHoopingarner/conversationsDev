<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
     <link rel="stylesheet" href="/css/main.css">
     <link rel="stylesheet" href="/css/register.css">
     <link rel="stylesheet" href="/res/fontawesome/css/all.min.css">
     <script src="/js/forgotPW.js"></script>
     <title>Reset Password</title>
</head>

<body>
     <form class="form" id="form">
          <h2><i class="fa fa-user"></i> Reset your password:</h2>
          <div class="form-control">
               <label for="email">Email Address</label>
               <input type="text" id="email" placeholder="Your email address">
               <small>Error message</small>
          </div>
          <h4>You will receive an email with a link to reset your password.</h4>
          <p class="formButton" id="submitBtn">Send</p>
          <!-- <p class="formButton" id="cancelBtn">Cancel</p> -->
     </form>
</body>

</html>