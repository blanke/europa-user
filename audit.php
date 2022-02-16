<?php

include './dbFunctions.php';
audit($_GET["location"], ip2long($_SERVER['REMOTE_ADDR']));

?>