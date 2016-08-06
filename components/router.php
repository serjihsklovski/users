<?php

class Router {
  private $_routes;   // array of routes

  public function __construct() {
    $this->_routes = include(ROOT . '/config/routes.php');
  }

  // returns request uri
  private static function _get_uri() {
    if (!empty($_SERVER['REQUEST_URI'])) {
      return trim($_SERVER['REQUEST_URI'], '/');
    }
  }
}
