<?php 
return function( ){
  $category = $_GET['cat'] ?? 'home';
  $id = $_GET['id'] ?? NULL;
  $action = $_GET['a'] ?? 'list';
  $controller = 'app\controllers\\'.$category.'Controller';

  if( ! class_exists( $controller ) ){
    return [
      'data' => ['error' => 'Clase inexistente'],
      'view' => 'error'
    ];
  }

  if(!method_exists($controller, $action)){
    return [
      'data' => ['error' => 'Método inexistente'],
      'view' => 'error'
    ];
  }

  if( ! is_null($id) ){
    return $controller::$action( $id );
  }

  return $controller::$action( );

};
