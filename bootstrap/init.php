<?php

use App\Classes\Database;
use App\classes\ErrorHandler;

if (!isset($_SESSION)) session_start();

define("APP_ROOT", realpath(__DIR__ . "/../"));
define("URL_ROOT", "http://eshop.org/");

require_once APP_ROOT . "/vendor/autoload.php";

require_once APP_ROOT . "/app/config/_env.php";

new Database();
new ErrorHandler();

require_once APP_ROOT . "/app/routing/router.php";

set_error_handler([new ErrorHandler(),'handleErrors']);