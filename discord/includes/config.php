<?php
// global path constants.
define('PATH_ABSOLUTE', dirname(__FILE__) . '/../');
define('PATH_INCLUDES', PATH_ABSOLUTE . 'includes/');

// require the website class.
require_once(PATH_INCLUDES . 'website.class.php');

// global website variables.
$website['discord_client'] = '705821757982113823';
$website['discord_secret'] = 'rhDKflSkJ5d1Vt-hULWRCX_zAoR2Csn2';
$website['discord_scopes'] = 'identify';
$website['name']           = 'Powered By Luxyz#1199';
$website['url']            = website::website_url();
$website['current_url']    = website::current_url();

// start a session.
session_start();
?>
