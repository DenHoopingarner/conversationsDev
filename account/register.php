<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, maximum-scale=1">
     <title>Den's Document</title>
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/register.css">
     <link rel="stylesheet" href="res/fontawesome/css/all.min.css">
     <script src="js/register.js"></script>
</head>

<body>
     <form class="form" id="form">
          <h2><i class="fa fa-user-plus"></i> Register with Us</h2>
          <div class="form-control">
               <label for="username">Your Name</label>
               <input type="text" id="username" placeholder="Enter your full name">
               <small>Error message</small>
          </div>
          <div class="form-control">
               <label for="email">Email Address</label>
               <input type="text" id="email" placeholder="Enter email">
               <small>Error message</small>
          </div>
          <div class="form-control">
               <label for="password">Password</label>
               <input type="password" id="password" placeholder="Enter Password">
               <small>Error message</small>
          </div>
          <div class="form-control">
               <label for="pw2">Verify Password</label>
               <input type="password" id="pw2" placeholder="Verify Password">
               <small>Error message</small>
          </div>
          <p class="formButton" id="submitBtn">Register</p>
          <p class="formButton" id="cancelBtn">Cancel</p>
     </form>

     <div class="wait" id="wait">
          <h1 class='waitH1'>Loading, please wait...</h1>
          <div class="kinetic"></div>
     </div>
</body>

</html>