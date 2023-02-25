<?php

$urlArray = explode('/', $_GET["url"]);

switch ($urlArray[0]) {
    case 'account':
        echo "Your account<br/>";
        switch ($urlArray[1]) {
            case 'login' :
                echo "you're trying to log in";
                break;
            case 'register' :
                echo "you're trying to register";
                break;
            case 'forgotpw' :
                echo "you forgot your password";
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

