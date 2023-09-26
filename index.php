<?php 
require 'app/utils/config.php';
require 'app/utils/functions.php';
require 'app/utils/autoload.php';
$routes = require 'app/utils/routes.php';
$route = $_GET['cat'] ?? '';

if( !isLogged( ) && $route != 'login' ){
  //Si no tengo id, no estoy logueado...
  //debo sí o sí ver el form de login...
  header("Location: /login");
}

try{
  $respuesta = $routes( );
  if( ! isset( $respuesta['view'] ) ){
    throw new Exception("Wacho falta la vista", 1); 
  }

  $view = VIEWS.'/'.$respuesta['view'].'.php';
  $data = $respuesta['data'] ?? [];
  $values = $respuesta['values'] ?? [];

  if( ! file_exists( $view ) ){
    throw new Exception("Wacho falta la vista $view", 1); 
  }

  include( VIEWS.'/structure/start.php' );
  include( $view );
  include( VIEWS.'/structure/end.php' );

}catch( Exception $e ){
  echo $e->getMessage( );
}