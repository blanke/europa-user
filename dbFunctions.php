<?php

function dbInit() {
	$conn = new mysqli(
		ini_get("mysqli.default_host"),
		ini_get("mysqli.default_user"),
		ini_get("mysqli.default_pw"),
		"europa-user");
	if ($conn->connect_error) die("ERROR 0x0901");
	return $conn;
}

function updatePageViews($sessionId, $remoteIp) {
	$conn = dbInit();
	$sql = "SELECT count FROM page_views WHERE remote_ip = "
		. mysqli_real_escape_string($conn, $remoteIp)
		. " AND session_id = "
		. mysqli_real_escape_string($conn, $sessionId);
	$result = $conn->query($sql);
	if ($result->num_rows === 1) {
		$count = $result->fetch_assoc()["count"] + 1;
		$sql = "UPDATE page_views SET count = "
			. mysqli_real_escape_string($conn, $count)
			. " WHERE remote_ip = "
			. mysqli_real_escape_string($conn, $remoteIp)
			. " AND session_id = "
			. mysqli_real_escape_string($conn, $sessionId);
	} else {
		$sql = "INSERT INTO page_views (remote_ip, session_id, count) Values ("
			. mysqli_real_escape_string($conn, $remoteIp)
			. ", "
			. mysqli_real_escape_string($conn, $sessionId)
			. ", 1)";
	}
	$result = $conn->query($sql);
	$conn->close();
	if ($result === TRUE) return TRUE;
	else die("ERROR 0x0904: ".$sql);
}

function readSettings($id) {
	$conn = dbInit();
	$sql = "SELECT id, initiatives, mapping, user_name, user_role FROM settings WHERE id = "
		. mysqli_real_escape_string($conn, $id);
	$result = $conn->query($sql);
	$conn->close();
	if ($result->num_rows === 1) return $result->fetch_assoc();
	else die("ERROR 0x0902");
}

function writeInitiatives($id, $initiatives) {
	$conn = dbInit();
	$sql = "UPDATE settings SET initiatives = '"
		. mysqli_real_escape_string($conn, $initiatives)
		. "' WHERE id = "
		. mysqli_real_escape_string($conn, $id);
	$result = $conn->query($sql);
	$conn->close();
	if ($result === TRUE) return TRUE;
	else die("ERROR 0x0903");
}
?>


