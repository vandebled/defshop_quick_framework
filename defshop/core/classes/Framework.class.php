<?php

class Framework {

  public static function run() {
    self::init();
    self::autoload();
    self::dispatch();
  }

  private static function init() {
    // setting different path constants
    define("DS", DIRECTORY_SEPARATOR);
    define("ROOT", getcwd() . DS);

    define("PUBLIC_PATH", ROOT . "web" . DS);

    define("APP_PATH", ROOT . 'application' . DS);

    define("CONFIG_PATH", APP_PATH . "config" . DS);
    define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
    define("MODEL_PATH", APP_PATH . "models" . DS);
    define("VIEW_PATH", APP_PATH . "views" . DS);

    define("FRAMEWORK_PATH", ROOT . "core" . DS);
    define("CORE_PATH", FRAMEWORK_PATH . "classes" . DS);
    define('DB_PATH', FRAMEWORK_PATH . "database" . DS);
    define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
    define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);

    // define actions constants
    define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : 'home');
    define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index');
    define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index');

    define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);
    define("CURR_VIEW_PATH", VIEW_PATH . PLATFORM . DS);

    // load core classes
    require CORE_PATH . "Controller.class.php";
    require CORE_PATH . "Loader.class.php";
    require DB_PATH . "Mysql.class.php";
    require CORE_PATH . "Model.class.php";

    include CONFIG_PATH . "config.php";

    session_start();
  }

  private static function autoload() {
    spl_autoload_register(array(__CLASS__,'load'));
  }

  private static function load($classname) {
    if (substr($classname, -10) == "Controller") {
      require_once CURR_CONTROLLER_PATH . "$classname.class.php";
    } elseif (substr($classname, -5) == "Model") {
      require_once  MODEL_PATH . "$classname.class.php";
    }
  }

  private static function dispatch() {
    $controllerName = CONTROLLER . "Controller";
    $actionName = ACTION . "Action";
    $controller = new $controllerName;
    $controller->$actionName();
  }

}
