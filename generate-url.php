<?php

require_once("TokenLogin.php");

$secret = "super_secret";
$otl = new TokenLogin($secret);

$uid = 10;
$token = $otl->create_token($uid);

$url = "http://www.example.com/tl.php?t=$token";
$url = "http://maj-daniel.majanit.com/projects/php-jwt-login/tl.php?t=$token";

echo $url;
exit;
