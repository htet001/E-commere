<?php

use Dotenv\Dotenv;

require_once APP_ROOT . "/vendor/autoload.php";

$dotenv = Dotenv::createUnsafeImmutable(APP_ROOT);
$dotenv->load();
