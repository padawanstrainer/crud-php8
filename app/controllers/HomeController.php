<?php 
namespace app\controllers;

class HomeController{
  //esto es la home
  public static function list( ){
    return [
      'data' => [],
      'view' => 'home'
    ];
  }
}