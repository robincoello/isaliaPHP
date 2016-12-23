<?php
  class CategoriasController extends Controller
  {
    function index()
    {
      $this->set('categorias',(new Category)->all()->order("pos"));
    }

    function add()
    {
      if (Input::hasPost('category')) {
        if ((new Category)->create(Input::post('category'))){
          Router::to('categorias/index');
        }
      }
    }

    function edit($id)
    {
      $this->set('category', (new Category)->get($id));

      if (Input::hasPost('category')) {
        $result = (new Category)->update($id, Input::post('category'));
        if ($result === true) {
          (new Flash)->set('success', 'Actualización Exitosa!');
          Router::to('categorias/index');
        }
        print_r($result);
      }
    }

    function del($id)
    {
      if ((new Category)->destroy($id)){
        Router::to('categorias/index');
      }
    }

  }
