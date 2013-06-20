<?php
/**
 * Application "entry point"
 *
 * @author Florian Krämer
 * @copyright 2013 Florian Krämer
 * @license GPLv2
 */

// Constants for the app
define('DS', DIRECTORY_SEPARATOR);
define('APP_ROOT', realpath(dirname(__FILE__)) . DS);
define('WWW_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/');

function debug($debug, $return = false) {
	if (!is_string($debug)) {
		$debug = var_export($debug, true);
	}

	if ($return !== true) {
		echo '<pre>' . $debug . '</pre>';
		return;
	}
	return $debug;
}

// Files for the mini MVC stack
require 'Config' . DS . 'config.php';
require 'Controller' . DS . 'Controller.php';
require 'View' . DS . 'View.php';

// Class Loader and SDKs
require APP_ROOT . '..' . DS . 'lib' . DS . 'Payment' . DS . 'Utility' . DS . 'ClassLoader.php';
require APP_ROOT . '..' . DS . 'vendors' . DS . 'SofortSdk' . DS . 'library' . DS . 'sofortLib.php';
require APP_ROOT . '..' . DS . 'vendors' . DS . 'AuthorizeNetSdk' . DS . 'AuthorizeNet.php';

// Register namespaces
$loader = new \Payment\Utility\ClassLoader('Payment', APP_ROOT . '..' . DS . 'lib');
$loader->register();
$loader = new \Payment\Utility\ClassLoader('Paypal', APP_ROOT . '..' . DS . 'vendors' . DS . 'PaypaylMerchantSdk' . DS . 'lib');
$loader->register();

$action = 'index';
if (!empty($_GET['action'])) {
	$page = $_GET['action'];
}

$controller = 'checkout';
if (!empty($_GET['controller'])) {
	$controller = $_GET['controller'];
}

$action = 'index';
if (!empty($_GET['action'])) {
	$action = $_GET['action'];
}

$controllerClass = ucwords($controller) . 'Controller';
$controllerFile = APP_ROOT . 'Controller' . DS . $controllerClass . '.php';

if (!file_exists($controllerFile)) {
	die('Page not found');
}

require_once($controllerFile);
$Controller = new $controllerClass();

if (!method_exists($Controller, $action)) {
	die(sprintf('Page %s not found', $action));
}

$Controller->beforeFilter();
$Controller->{$action}();
$Controller->render();
$Controller->afterRender();