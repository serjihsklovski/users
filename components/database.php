<?php

class Database {
  public static function connect() {
    $login_path = ROOT . '/config/login.php';
    $login = include($login_path);
    $dsn = "mysql:host={$login['host']};dbname={$login['dbname']}";

    return new PDO($dsn, $login['user'], $login['password']);
  }
}
