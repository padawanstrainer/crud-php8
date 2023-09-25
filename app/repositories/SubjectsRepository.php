<?php 
namespace app\repositories;

use app\models\SubjectsModel;

class SubjectsRepository{
  public static function getAll( $id_teacher ){
    $consulta = <<<SQL
      SELECT * 
      FROM subjects
    SQL;

    $subject = new SubjectsModel( );
    $resultados = $subject->select( 'id,subject' );
    var_dump($resultados);
  }
}
