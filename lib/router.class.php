<?php

  class Router
  {
    static function to($route)
    {
      header('Location: ' . PUBLIC_PATH . $route, TRUE, 302);
    }
  }
