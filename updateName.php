<?php

include './dbFunctions.php';

writeSettingsField($_GET["id"], "user_name", $_GET["value"]);

?>