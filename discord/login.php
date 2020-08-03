<?php
require_once('includes/config.php');
require '../_config.php';

if ( isset($_SESSION['discord']) || isset($_GET['error']) ) {
   website::website_redirect($website['url']);
}
else if ( isset($_GET['code']) ) {
   $auth = website::discord_auth($website['discord_client'], $website['discord_secret'], $website['discord_scopes'], $_GET['code']);
   if ( $auth ) {
      $user = website::discord_user_info($auth['access_token']);
      if ( $user ) {

        $SQL = $odb->prepare("SELECT * FROM users WHERE username = :username");
        $SQL -> execute(array(':username' => $user["id"]));
        $data = $SQL->fetch(PDO::FETCH_ASSOC);

        if (empty($data["username"])) {
            $tmpay = $odb -> prepare("INSERT INTO users (username,password,email) VALUES (:username,:password,:email)");
            $tmpay->execute([':username' => $user['id'], ':password' => md5($user['id']), ':email' => "fewno1@gmail.com"]);
        }

         $_SESSION['username'] = $user['id'];
         $_SESSION['sername'] = $user['username'];
         
         website::website_redirect($website['url']);
      }
   }
}
else {
   website::discord_auth_redirect($website['discord_client'], $website['discord_scopes']);
}
?>
