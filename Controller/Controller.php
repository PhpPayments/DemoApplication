<?php
/**
 * Basic Controller class as the controller in the MVC pattern
 *
 * @author Florian Krämer
 * @copyright 2013 Florian Krämer
 * @license GPLv2
 */

class Controller {

	protected $_View = null;

	public function __construct() {
		$this->_View = new View();
	}

	public function set($name, $value = null) {
		$this->_View->set($name, $value);
	}

	public function beforeFilter() {

	}

	public function render($file = null) {
		if (empty($file)) {
			$controller = 'checkout';
			if (!empty($_GET['controller'])) {
				$controller = $_GET['controller'];
			}

			$action = 'index';
			if (!empty($_GET['action'])) {
				$action = $_GET['action'];
			}

			$file = $controller . DS . $action;
		}

		$this->_View->render($file);
	}

	protected function _setFlash($message, $class ='', $body = '') {
		$_SESSION['flash'] = array(
			'message' => $message,
			'class' => 'alert-' . $class,
			'body' => $body,
		);
	}

	public function afterRender() {

	}

}