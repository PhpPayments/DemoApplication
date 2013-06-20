<?php
/**
 * Basic view (as the V in MVC) file renderer
 *
 * @author Florian Krämer
 * @copyright 2013 Florian Krämer
 * @license GPLv2
 */
class View {

	public $layout = 'default';

	public $viewPath = '';

	protected $_vars = array();

	public function __construct($layout = 'default') {
		$this->layout = $layout;
		$this->viewPath = APP_ROOT . 'View' . DS;
	}

	public function set($name, $value = null) {
		if (is_array($name) && $value === null) {
			$this->_vars =array_merge($this->_vars, $name);
			return;
		}
		$this->_vars[$name] = $value;
	}

	public function render($file) {
		$file = $this->viewPath = APP_ROOT . 'View' . DS . $file . '.php';
		if (is_file($file)) {
			ob_start();
			extract($this->_vars);
			include($file);
			$content = ob_get_contents();
			ob_end_clean();
		} else {
			die(sprintf('Cant find view file %s!', $file));
		}

		$this->_renderLayout($this->layout, $content);
	}

	protected function _renderLayout($file, $contentForLayout) {
		$file = APP_ROOT . 'View' . DS . 'Layout' . DS . $this->layout . '.php'; 
		ob_start();
		if (is_file($file)) {
			include($file);
		} else {
			die(sprintf('Cant find layout file %s!', $file));
		}
		ob_end_flush();
		exit;
	}

}