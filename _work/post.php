<?php
header('Content-Type: application/json');

$myRes['username'] = $_POST["username"];
$myRes['email'] = $_POST["email"];

$myJSON = json_encode($myRes);
echo $myJSON;
