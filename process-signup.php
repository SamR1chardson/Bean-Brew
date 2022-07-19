<?php

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_repeat = $_POST["password_repeat"];
if (empty($name)) {
	die("[ERROR] No name entered.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	die("[ERROR] Email is invalid.");
}

if (strlen($password) < 8) {
	die("[ERROR] Password needs to be 8 characters long.");
}

if (!preg_match("/[a-z]/i", $password)) {
	die("[ERROR] Passwords do not match.");
}

if (!preg_match("/[0-9]/", $password)) {
	die("[ERROR] Password requires a number.");
}

if ($password !== $password_repeat) {
	die("[ERROR] Passwords do not match.");
}

$pw_hash = password_hash($password, PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/db.php";

$sql = "INSERT INTO user (name, email, pw_hash)
		VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
	die("[ERROR] SQL Error " . $mysqli->error);
}

$stmt->bind_param("sss", $name, $email, $pw_hash);
if ($stmt->execute()) {
	header("Location: index.php");
	exit;
}
else {
	if ($mysqli->errno === 1062) {
		die("[ERROR] Email already taken");
	}
	else {
		die("[ERROR] Signup exited with error code " . $mysqli->errno);
	}
}
?>