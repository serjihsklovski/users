<?php

$login_path = '../config/login.php';
$login = include($login_path);
$dsn = "mysql:host={$login['host']};dbname={$login['dbname']}";
$aedt = date('Y:m:d H:i:s');
$conn = new PDO($dsn, $login['user'], $login['password']);
$conn->query("INSERT INTO users VALUES(NULL, '{$_POST['uname']}', '{$_POST['email']}', '$aedt')");

echo $conn->lastInsertId() . '|' . $aedt;
