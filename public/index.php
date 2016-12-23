<?php
error_reporting(E_ALL ^ E_STRICT); // Comentar en producción
ini_set('display_errors', 'On'); //comentar en producción

define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', ROOT . DS . 'app' . DS);
define('LIB_PATH', ROOT . DS . 'lib' . DS);

define('START_TIME', microtime(TRUE));

define('PUBLIC_PATH', '/isalia/' );

$url = isset($_GET['url']) ? $_GET['url'] : '/'; // isset($_GET['_url']) ? $_GET['_url'] : '/';

session_start();

require_once (LIB_PATH . 'bootstrap.php');
