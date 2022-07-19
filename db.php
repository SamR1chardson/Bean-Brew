<?php

$host = "localhost";
$username = "root";
$pw = "";
$db = "login_db";

$mysqli = new mysqli($host, $username, $pw, $db);

if ($mysqli->connect_errno) {
	die("[ERROR] Failed to connect due to " . $mysqli->connect_error);
}

return $mysqli;

?>