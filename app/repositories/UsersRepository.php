<?php 
namespace app\repositories;

use app\models\UsersModel;

class UsersRepository{
  public static function checkLogin( $user, $pass ){
    $obj_user = new UsersModel( );
    $response = $obj_user->select(
      "*",
      [
        'where' => "user = :user AND pass = :pass",
        'replaces' => [
          ':user' => $user,
          ':pass' => $pass
        ]
      ],
      true
    );
    return $response;
  }

  public static function getTeachers( ){
    $obj_user = new UsersModel( );
    $response = $obj_user->select(
      "id, name, lastname",
      [
        'where' => "rol = 'teacher'",
        'order' => "lastname, name"
      ]
    );
    return $response;
  }
}