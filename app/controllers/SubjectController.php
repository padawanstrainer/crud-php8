<?php 
namespace app\controllers;

use app\repositories\SubjectsRepository;
use app\repositories\UsersRepository;

class SubjectController{
  public static function list( ){
    $id_user = !isAdmin() ? $_SESSION['id'] : null;
    $resultados = SubjectsRepository::getAll($id_user);

    return [
      'data' => ['subjects' => $resultados ],
      'view' => 'subjects/list'
    ];
  }

  public static function details( ){
    var_dump('detalle del subject');
  }

  public static function new( ){
    if( isPost( ) ){
      SubjectsRepository::create( $_POST );
      header("Location: /subject");
      die( );
    }

    $teachers = UsersRepository::getTeachers( );
    return [
      'data' => [
        'teachers' => $teachers,
        'form' => [
          'title' => 'Alta de materia',
          'button' => 'Crear',
          'action' => '/subject/new'
        ]
      ],
      'view' => 'subjects/form'
    ];
  }

  public static function edit( $id ){
    if( isPost( ) ){
      SubjectsRepository::update( $id );
      header("Location: /subject");
      die( );
    }
    $subject = SubjectsRepository::find( $id );
    $teachers = UsersRepository::getTeachers( );
    return [
      'data' => [
        'teachers' => $teachers,
        'form' => [
          'title' => 'Editar materia',
          'button' => 'Actualizar',
          'action' => "/subject/$id/edit"
        ]
      ],
      'values' => $subject,
      'view' => 'subjects/form'
    ];
  }

  public static function delete( $id ){
    SubjectsRepository::remove( $id );
    header( "Location: /subject" );
    die( );
  }

}