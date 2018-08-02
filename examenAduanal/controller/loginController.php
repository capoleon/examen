<?php


  $user = $_POST['user_php'];
  $clave = $_POST['clave_php'];

  if(empty($user) || empty($clave)){

    echo 'error_1';

  }else{


   if(filter_var($user, FILTER_VALIDATE_EMAIL)){

    require_once('../model/usuario.php');
   
    $usuario = new Usuario();

    $usuario -> login($user, $clave);

    }else{
      echo 'error_2';
    }

  }


?>
