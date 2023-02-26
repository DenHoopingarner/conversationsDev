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
     <script src="/js/login.js"></script>
     <title>Log In</title>
</head>

<body>
     <form class="form" id="form">
          <h2><i class="fa fa-user"></i> Log in:</h2>
          <div class="form-control">
               <label for="email">Email Address</label>
               <input type="text" id="email" placeholder="Your email address">
               <small>Error message</small>
          </div>
          <div class="form-control">
               <label for="password">Password</label>
               <input type="password" id="password" placeholder="Your account password">
               <small>Error message</small>
          </div>
          <p class="formButton" id="submitBtn">Log In</p>
          <p class="formButton" id="cancelBtn">Cancel</p>
     </form>
     <h4 class="h4">
          <i class="fa fa-question-circle"></i> Forgot your password?
          <br />
          <a href='forgotPW.php'>Reset it here</a>.
     </h4>
     <h4 class="h4">
          <i class="fa fa-user-plus"></i>
          No account? No problem!
          <br />
          <a href='register.php'>Register here</a>.
     </h4>
</body>

</html>