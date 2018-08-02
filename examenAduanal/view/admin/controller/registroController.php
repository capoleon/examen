<?php

  $name       = $_POST['name'];
  $telefono   = $_POST['telefono'];
  $rfc        = $_POST['rfc'];
  $nick       = $_POST['nick'];
  $direccion  = $_POST['direccion'];
  $email      = $_POST['email'];
  $clave      = $_POST['clave'];
  $clave2     = $_POST['clave2'];
  $cargo      = $_POST['cargo'];

  if(empty($name)  || empty($telefono) || empty($rfc) || empty($nick) || empty($clave) || empty($clave2)){

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{

    if($clave == $clave2){

      if(filter_var($email, FILTER_VALIDATE_EMAIL)|| empty($email)) {

        if(is_numeric($telefono)){

          if ($cargo == "0") {
            echo 'error_6';
          }else{

        # Incluimos la clase usuario
        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        # Llamamos al metodo login para validar los datos en la base de datos
        $usuario -> registroUsuario($name, $telefono, $rfc, $email,  $direccion, $nick, $clave, $cargo);

      }}else{
        echo 'error_5';
      }
      }else{
        echo 'error_4';
      }


    }else{
      echo 'error_2';
    }

  }





?>
