<?php 
namespace app\models;

use PDO;

class EntityModel{
  private $connection; 
  protected $tabla = 'tbl';
  protected $alias = 't'; 
  protected $primary = 'id';

  public function select(
    $columns = '*',
    $filtros = [],
    $onlyOneResult = false
  ){

    $consulta = "SELECT $columns FROM $this->tabla as $this->alias";
    
    if( isset( $filtros['joins'] ) ){
      $joins = [];
      foreach( $filtros['joins']  as $j ){
        $type = strtoupper($j['type'] ?? ''); 
        $joins[] = "$type JOIN $j[table] ON $j[on]";
      }
      $consulta .= " " .implode( "\n", $joins );
    }

    if( isset( $filtros['where'] ) ){
      $consulta .= " WHERE $filtros[where]";
    }

    if( isset( $filtros['order'] ) ){
      $consulta .= " ORDER BY $filtros[order]";
    }

    $replaces_array = $filtros['replaces'] ?? NULL;

    $this->connect( );
    $stmt = $this->connection->prepare( $consulta );
    $stmt->execute( $replaces_array );
    return $onlyOneResult ? $stmt->fetch( ) : $stmt->fetchAll( );
  }

  public function insert( $data ){
    $replaces = [];
    foreach( $data as $col => $val ){
      $replaces[ ":$col" ] = $val;
    }
  
    $columns = implode( "," , array_keys($data) ); 
    $values = implode(", ", array_keys($replaces) );

    $query = "INSERT INTO $this->tabla ( $columns ) VALUES ( $values )";

    $this->connect( );
    $stmt = $this->connection->prepare( $query );
    $stmt->execute( $replaces );
    return $this->connection->lastInsertId( );
  }

  public function update( $data, $id ){
    $replaces = [];
    $values = [];
    foreach( $data as $col => $val ){
      $values[] = " $col = :$col ";
      $replaces[ ":$col" ] = $val;
    }

    $values = implode( " ", $values );
  
    $query = "UPDATE $this->tabla SET $values WHERE id = :id LIMIT 1";
    $replaces[ ":id" ] = $id;
    
    $this->connect( );
    $stmt = $this->connection->prepare( $query );
    $stmt->execute( $replaces );
  }

  public function delete( $id ){
    $consulta = "DELETE FROM $this->tabla WHERE $this->primary = :id LIMIT 1";
    $this->connect( );
    $stmt = $this->connection->prepare( $consulta );
    $stmt->execute( [':id' => $id] );
  }

  private function connect( ){
    $dns = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4';
    $this->connection = new PDO( $dns, DB_USER, DB_PASS );
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }
}