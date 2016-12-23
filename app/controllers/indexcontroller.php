<?php

class IndexController extends Controller {
  function index()
  {
    $usuario = new User();
    $this->set('usuarios',$usuario->all());
  }

    function login()
  {
    if ( Input::hasPost('usuario') ) {
      if ( Auth::check(Input::post('usuario') ) ) {
	      	(new Flash)->set('success', 'Bienvenido ' . Auth::get());
          Router::to('index/index');
      }
    }
  }

  function logout()
  {
      Auth::destroy();
      (new Flash)->set('success', 'Hasta pronto!');
      Router::to('index/index');
  }
}
