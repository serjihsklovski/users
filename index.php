<?php
/*
 * Файл index.php выполняет функции front controller'а
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once ROOT . '/components/router.php';
require_once ROOT . '/components/error_404.php';
require_once ROOT . '/components/database.php';

$router = new Router();

try {
  $router->run();
} catch (Error_404 $e) {
  echo $e->msg();
}
