<?php 
namespace app\repositories;

use app\models\UsersModel;

class StudentsRepository{
  public static function getAll( $id_teacher ){
    $consulta = <<<SQL
      SELECT * 
      FROM asignature 
      JOIN courses ON asignature.fkcourse = courses.id 
      WHERE courses.fkteacher='$id_teacher' 
    SQL;

    $user = new UsersModel( );
    $resultados = $user->select( 'u.lastname, u.name, a.fkstudent, a.fkcourse, a.e1, a.e2, a.e3, a.e4', [
      'joins' => [
        ['table' => 'asignature AS a', 'on' => 'a.fkstudent = u.id'],
        ['table' => 'courses AS c', 'on' => 'c.id = a.fkcourse']
      ],
      'where' => "c.fkteacher='$id_teacher'",
      'order' => 'u.lastname, u.name', 
    ] );
  
    return $resultados;
  }
}
