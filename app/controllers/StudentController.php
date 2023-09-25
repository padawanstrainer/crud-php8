<?php 
namespace app\controllers;

use app\repositories\StudentsRepository;

class StudentController{
  public static function list( ){
    $users =  StudentsRepository::getAll( $_SESSION['id'] );
    /* tabla de resultados */
    return [
      'data' => [ 
        'users' => $users
      ],
      'view' => 'students/list'
    ];
  }

  public static function details( ){
    /* ver detalle */
    return [
      'data' => [],
      'view' => 'students/details'
    ];
  }

  public static function new( ){
    /* form de alta */
    return [
      'data' => [],
      'view' => 'students/new'
    ];
  }

  public static function edit( ){
    /* form de edicion */
    return [
      'data' => [],
      'view' => 'students/edit'
    ];
  }

  public static function delete( ){
    /* este no renderiza nada... borra y redirecciona */
    var_dump('borrando student');
  }
}