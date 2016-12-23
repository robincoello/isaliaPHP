<?php

  class Flash
  {
  	function set($type,$message) {
      $_SESSION['flash'] = NULL;
      $_SESSION['flash'] = array('type' => $type, 'message' => $message);
  	}

    public function hasMessages() {
      return (isset($_SESSION['flash']) ? $_SESSION['flash']  !== NULL : false);
    }

    function render()
    {
      if (isset($_SESSION['flash'])) {
        $result = '<span class="alert alert-'. $_SESSION['flash']['type'] . '">' . $_SESSION['flash']['message'] . '</span>';
        echo $result;
        unset($_SESSION['flash']);
      }
    }
  }
