<?php

require_once("TokenLogin.php");

$secret = "super_secret";
$otl = new TokenLogin($secret);

$payload = $otl->validate_token($_GET["t"]);

if ($payload) {
   echo "<pre>Valid token! You are user #{$payload->uid}";
   // redirect
} else {
   echo "<pre>Invalid token";
}
exit;
