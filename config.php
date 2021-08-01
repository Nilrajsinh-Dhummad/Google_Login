<?php
require_once('vendor/autoload.php');

$google_client = new Google_Client();

$google_client->setClientId('918995609694-0iegp9mf0d9s2fmmo902fpgvdf6me53a.apps.googleusercontent.com');

$google_client->setClientSecret('FmKVwpHM7qvcBYTA321bVyx3');

$google_client->setRedirectUri('https://localhost/test2/');

$google_client->addScope('email');
$google_client->addScope('profile');

session_start();

?>