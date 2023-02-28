<?php

$urlArray = explode('/', $_GET["url"]);

$thisFile = $urlArray[0] . '.php';

if(file_exists($thisFile)){
     include_once ($thisFile);
} else {
     echo 'file not found';
}

// echo 'you tried ' . $urlArray[0];

