<?php 
require 'app/utils/config.php';
require 'app/utils/autoload.php';
$routes = require 'app/utils/routes.php';

try{
  $respuesta = $routes( );
  if( ! isset( $respuesta['view'] ) ){
    throw new Exception("Wacho falta la vista", 1); 
  }

  $view = VIEWS.'/'.$respuesta['view'].'.php';
  $data = $respuesta['data'];

  if( ! file_exists( $view ) ){
    throw new Exception("Wacho falta la vista $view", 1); 
  }

  include( VIEWS.'/structure/start.php' );
  include( $view );
  include( VIEWS.'/structure/end.php' );

}catch( Exception $e ){
  echo $e->getMessage( );
}