<?php

include("lib/cronofy.php");

function DebugLog($log){
  $result = file_put_contents(__DIR__ . "/log/debug.log", date("c") . " - " . $log . "\n", FILE_APPEND);
}

$GLOBALS['CRONOFY_CLIENT_ID'] = "afOfaX6QGq_607W6z9BciK0n_mek8qhc";
$GLOBALS['CRONOFY_CLIENT_SECRET'] = "6yOaLp-7SZyv1IyChYHvw2hoURL_v1hclM1-1RaTejb7y8RyZA4fIw07OdDbnXAig6Rxu3BINEerlEJsu0NSdg";

$GLOBALS['DOMAIN'] = "http://c0818db7.ngrok.io";

if($GLOBALS['CRONOFY_CLIENT_ID'] == "" || $GLOBALS['CRONOFY_CLIENT_SECRET'] == "" || $GLOBALS['DOMAIN'] == ""){
  header('Location: /setup.php');
}
