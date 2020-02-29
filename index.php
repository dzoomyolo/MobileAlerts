<?php
// ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require "./a.php";//debug
require "./core/autoload/autoload.php";//autoloader classes
use core\classes\Router;
use core\classes\DatabaseWorker;
$db = new DatabaseWorker;
require "./core/autoload/autoloadFunctions.php";//loader functions
$router = new Router;
?>
