<?php
class Template {

	protected $variables = array();
	protected $_controller;
	protected $_action;

	function __construct($controller,$action) {
		$this->_controller = $controller;
		$this->_action = $action;
	}

	/** Set Variables **/

	function set($name,$value) {
		$this->variables[$name] = $value;
	}

	/** Display Template **/

    function render() {
		extract($this->variables);

			if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_controller . DS . 'header.phtml')) {
				include (ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_controller . DS . 'header.phtml');
			} else {
				include (ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . 'default' . DS . 'header.phtml');
			}

      if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.phtml')) {
        include (ROOT . DS . 'app' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.phtml');
      } else {
        include (ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . 'default' . DS . 'error.phtml');
      }


			if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_controller . DS . 'footer.phtml')) {
				include (ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_controller . DS . 'footer.phtml');
			}  else {

				include (ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . 'default' . DS . 'footer.phtml');
			}
    }

}
