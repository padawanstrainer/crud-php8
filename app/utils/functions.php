<?php 
function getErrorMessage( ){
  if( isset( $_SESSION['error'] ) ){
    echo "<div class='error_message'>$_SESSION[error]</div>";
    unset( $_SESSION['error'] );
  }
}

function isLogged( ){
  return isset( $_SESSION['id'] );
}

function isAdmin( ){
  return  isset( $_SESSION['rol'] )
          && $_SESSION['rol']  == 'admin';
}

function form_value( $key ){
  global $values;
  return $values[$key] ?? '';
}

function isPost( ){
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}