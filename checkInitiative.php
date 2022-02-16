<?php

include './dbFunctions.php';

function getInitiatives($settings) {
	$initiativesStr = $settings["initiatives"];

	if (!substr($initiativesStr, 0, 1) === "[" || !substr($initiativesStr, -1) === "]") {
		die("ERROR 0x0201");
	}

	return explode(",", substr($initiativesStr, 1, -1));
}

$id = $_GET["id"];
$initiative = $_GET["initiative"];
$checked = $_GET["checked"];

$settings = readSettings($id);
$initiatives = getInitiatives($settings);

if ($checked) {
	if (!in_array($initiative, $initiatives))
		array_push($initiatives, $initiative);
} else $initiatives = array_diff($initiatives, array($initiative));

writeSettingsField($id, "initiatives", "[" . implode(",", $initiatives) . "]");

$settings = readSettings($id);
$initiatives = getInitiatives($settings);

echo "{\"initiatives\": ".$settings["initiatives"].", \"mapping\": ".$settings["mapping"]."}";
?>