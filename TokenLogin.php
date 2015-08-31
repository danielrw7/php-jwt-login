<?php

require_once('vendor/autoload.php');
use \Firebase\JWT\JWT;

class TokenLogin {
   private $secret;

   function __construct($secret) {
      $this->secret = $secret;
   }

   function create_token($uid, $token_duration = 24 /* Hours */) {
      $uid = intval($uid);
      if (!($uid > 0)) return;

      $now = time();

      $data = array();
      $data['uid'] = $uid;
      $data['iat'] = $now;
      $data['exp'] = $now + $token_duration * (60 * 60);

      return JWT::encode($data, $this->secret);
   }

   function validate_token($token) {
      try {
         $payload = JWT::decode($token, $this->secret, array('HS256'));
         if (!$payload) return FALSE;
         return json_decode(json_encode($payload));
      } catch (Exception $e) {
         die(var_dump($e));
         return FALSE;
      }
   }
}

?>
