<?php

include './dbFunctions.php';
audit($_GET["location"], null, ip2long($_SERVER['REMOTE_ADDR']));

?>