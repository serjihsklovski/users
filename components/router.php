<?php

class Router {
  private $_routes;   // array of routes

  public function __construct() {
    $this->_routes = include(ROOT . '/config/routes.php');
  }
}
