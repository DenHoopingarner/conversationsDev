<?php


// Send confirmation email
$emailTo = 'denniehoopingarner@icloud.com';
$emailName = 'Den The Mighty';
$emailSubject = 'Verify your Conversations registration';
$emailSuccessMsg = 'email sent successfully';
$emailFailMsg = 'email sent successfully';
$emailFrom = 'An Email System';

$varCode = '123';

$emailBody =
     "
          <h3>Thanks for registering with Conversations.</h3>

          <p>Hello, $varFullName.  You must verify your account before you can log in.</p>
          <p><a href='http://conversations.denniehoopingarner.com/checkVerify.php?z=" . $varCode . "'>Click here to verify</a></p>
          ";
require_once('_mailtemplate.php');
