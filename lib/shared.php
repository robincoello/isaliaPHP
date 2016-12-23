<?php

/** Check if environment is development and display errors **/

function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicQuotes() {
if ( get_magic_quotes_gpc() ) {
	$_GET    = stripSlashesDeep($_GET   );
	$_POST   = stripSlashesDeep($_POST  );
	$_COOKIE = stripSlashesDeep($_COOKIE);
}
}

/** Check register globals and remove them **/

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Main Call Function **/

function callHook() {
	global $url;

	//echo "U: " . $url . "<br/>";

	$urlArray = array();
	$urlArray = explode("/",$url);

	$controller = ( isset($urlArray[0]) && !empty($urlArray[0]) ) ? $urlArray[0] : DEFAULT_CONTROLLER ;
	//echo "C: " . $controller . "<br/>";
	array_shift($urlArray);
	$action = ( isset($urlArray[0]) && !empty($urlArray[0]) ) ? $urlArray[0] : DEFAULT_ACTION;
	//echo "A: " . $action . "<br/>";
	array_shift($urlArray);
	$queryString = $urlArray;

	$controllerName = $controller;
	$controller = ucwords($controller);
	$controller .= 'Controller';
	$dispatch = new $controller($controllerName,$action);

	if ((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch,$action),$queryString);
	} else {
		/* Error Generation Code Here */

	}
}

/** Autoload any classes that are required **/

function __autoload($className) {
	if (file_exists(ROOT . DS . 'lib' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'lib' . DS . strtolower($className) . '.class.php');
	} else if (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'app' . DS . 'models' . DS . strtolower($className) . '.php');
	} else {
		/* Error Generation Code Here */
	}
}

setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();
