<?php

$urlArray = explode('/', $_GET["url"]);

if ($urlArray[0] == 'account') {
    $thisFile = $urlArray[1] . '.php';
    if (file_exists($thisFile)) {
        include_once($thisFile);
    } else {
        echo 'file not found';
    }
} else {
    echo 'fatal error';
}

// echo 'you tried ' . $urlArray[0];
