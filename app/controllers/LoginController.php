<?php 
namespace app\controllers;

use app\repositories\UsersRepository;

class LoginController{
  public static function list( ){
    return [ 'view' => 'login/form' ];
  }

  public static function start( ){
    $user = $_POST['user'];
    $pwd = sha1( $_POST['pwd'] );
    $usr = UsersRepository::checkLogin($user, $pwd);
    if( ! $usr ){
      $_SESSION['error'] = "Mal usuario o clave";
      header( "Location: /login" );
      die( );
    }

    $_SESSION = $usr;
    header( "Location: /" );
  }


  public static function end( ){
    session_start();
    session_destroy();
    header( "Location: /" );
  }
}