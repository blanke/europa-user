<?php

include './dbFunctions.php';

writeSettingsField($_GET["id"], "name", $_GET["value"]);

?>