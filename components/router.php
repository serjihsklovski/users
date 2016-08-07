<?php

class Router {
  private $_routes;   // array of routes

  public function __construct() {
    $this->_routes = include(ROOT . '/config/routes.php');
  }

  public function run() {
    $uri = self::_get_uri();

    // does `$uri` exist in `$_routes`?
    foreach ($this->_routes as $uri_pattern => $path) {
      if (preg_match("~$uri_pattern~", $uri)) {
        $internal_route = preg_replace("~$uri_pattern~", $path, $uri);
        $segments = explode('/', $internal_route);
        $tmp = array_shift($segments);
        $controller_filename = ROOT . '/controllers/' . $tmp . '_controller'
            . '.php';
        $controller_name = ucfirst($tmp . 'Controller');
        $action_name = 'action_' . array_shift($segments);
        $args = $segments;  // other elements

        if (file_exists($controller_filename)) {
          include_once($controller_filename);
        }

        $logmsg =
              "Datetime:   " . date('Y.m.d H:i:s') . "\n"
            . "Controller: `$controller_name`\n"
            . "File:       `$controller_filename`\n"
            . "Action:     `$action_name`\n"
            . "Arguments:  ";

        for ($i = 0; $i < count($args); $i++) {
          $logmsg .= "`$args[$i]` ";
        }

        $logmsg .= "\n======================================================\n";

        Logger::log_to(ROOT . '/logs/log.txt', $logmsg);

        $controller = new $controller_name;
        $res = call_user_func_array(array($controller, $action_name), $args);

        if ($res != null) {
          return;
        }
      }
    }

    throw new Error_404;
  }

  // returns request uri
  private static function _get_uri() {
    if (!empty($_SERVER['REQUEST_URI'])) {
      return trim($_SERVER['REQUEST_URI'], '/');
    }
  }
}
