<?php 
namespace app\models;

use PDO;

class EntityModel{
  private $connection; 
  protected $tabla = 'tbl';
  protected $alias = 't'; 

  public function select( $columnas = '*', $filtros = [] ){

    $consulta = "SELECT $columnas FROM $this->tabla as $this->alias";
    
    if( isset( $filtros['joins'] ) ){
      $joins = [];
      foreach( $filtros['joins']  as $j ){
        $joins[] = "$j[type] JOIN $j[table] ON $j[on]";
      }
      $consulta .= implode( "\n", $joins );
    }

    if( isset( $filtros['where'] ) ){
      $consulta .= " WHERE $filtros[where]";
    }

    if( isset( $filtros['order'] ) ){
      $consulta .= " ORDER BY $filtros[order]";
    }

    $this->connect( );
    $stmt = $this->connection->prepare( $consulta );
    $stmt->execute( );
    return $stmt->fetchAll( );
  }

  public function update( $datos, $id ){

  }

  public function insert( $datos ){

  }

  public function delete( $id ){
    
  }

  private function connect( ){
    $dns = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4';
    $this->connection = new PDO( $dns, DB_USER, DB_PASS );
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }
}