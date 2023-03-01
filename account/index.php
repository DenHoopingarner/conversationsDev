<?php

$urlArray = explode('/', $_GET["url"]);

switch ($urlArray[0]) {
    case 'account':
        echo "Your account<br/>";
        switch ($urlArray[1]) {
            case 'login' :
                // echo "you're trying to log in";
                include_once ('login.php');
                break;
            case 'register' :
                include_once ('register.php');
                break;
            case 'forgotpw' :
                include_once ('forgotPW.php');
                break;
            case 'verifyAccount' :
                include_once ('verifyAccount.php');
                break;
            default :
                echo 'fatal error';
        }
        break;
    case 'main':
        echo "you're trying to access the main";
        break;
    default:
        echo "fatal error";
}

// echo 'you tried ' . $urlArray[0];

