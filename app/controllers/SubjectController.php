<?php 
namespace app\controllers;

use app\repositories\SubjectsRepository;

class SubjectController{
  public static function list( ){
    $resultados = SubjectsRepository::getAll($_SESSION['id']);
    var_dump($resultados);
    die( );

    return [
      'data' => [],
      'view' => 'students/list'
    ];
  }
  
  public static function details( ){
    var_dump('detalle del subject');
  }

  public static function new( ){
    var_dump('alta de subject');
  }

  public static function edit( ){
    var_dump('actualizando subject');
  }

  public static function delete( ){
    var_dump('borrando subject');
  }
}