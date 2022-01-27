<?php

include './dbFunctions.php';

$settings = readSettings($_GET["id"]);
updatePageViews($_GET["id"], ip2long($_SERVER['REMOTE_ADDR']));

echo "{\"initiatives\": ".$settings["initiatives"].", \"mapping\": ".$settings["mapping"]."}";

?>