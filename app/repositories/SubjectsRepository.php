<?php 
namespace app\repositories;

use app\models\SubjectsModel;
use app\models\CoursesModel;

class SubjectsRepository{
  public static function find( $id ){
    $obj_subject = new SubjectsModel( );
    $subject = $obj_subject->select( "subject, fkteacher, c.id AS idcourse", [
      'joins' => [
        ['table' => 'courses as c', 'on' => 'c.fksubject = s.id', 'type' => 'left' ]
      ],
      'where' => 's.id = :id',
      'replaces' => [
        ':id' => $id
      ]
    ], true );

    return $subject;
  }

  public static function getAll( $id_teacher ){
    //$where = ! is_null( $id_teacher ) ? "
    $subject = new SubjectsModel( );
    $resultados = $subject->select( 's.id, subject, IFNULL( u.name, "-" ) AS name, IFNULL( u.lastname, "-") AS lastname', [
      'joins' => [
        ['table' => 'courses AS c', 'on' => 'c.fksubject = s.id', 'type' => 'left' ],
        ['table' => 'users AS u', 'on' => 'c.fkteacher = u.id', 'type' => 'left']
      ],
      'order' => 'subject'
      //'where' => $where 
    ] );

    return $resultados;
  }

  public static function create( ){
    $obj_subject = new SubjectsModel( );
    $id_materia = $obj_subject->insert( [
      'subject' => $_POST['subject']
    ] );

    $obj_courses = new CoursesModel( );
    $obj_courses->insert( [
      'fksubject' => $id_materia,
      'fkteacher' => $_POST['teacher']
    ] );
  }
  public static function update( $id ){
    $obj_subject = new SubjectsModel( );
    $obj_subject->update(
      [
        'subject' => $_POST['subject']
      ],
      $id
     );

    if( isset( $_POST['rel'] ) ){
      //rel es el ID de la cursada
      $obj_courses = new CoursesModel( );
      $obj_courses->update( [
        'fkteacher' => $_POST['teacher']
      ], $_POST['rel'] );
    }
    
  }

  public static function remove( $id ){
    $obj_subject = new SubjectsModel( );
    $obj_subject->delete( $id );
  }
}
