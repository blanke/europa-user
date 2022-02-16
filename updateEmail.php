<?php

include './dbFunctions.php';

writeSettingsField($_GET["id"], "email", $_GET["value"]);

?>