<?php

include './dbFunctions.php';
audit($_GET["location"], $_GET["action"], ip2long($_SERVER['REMOTE_ADDR']));

?>