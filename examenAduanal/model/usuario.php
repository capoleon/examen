<?php


  class Usuario{

    public function login($user, $clave){

      if ($user == "capoleon01@gmail.com" && $clave == "123") {
        $consulta = 1 ;
      }

        if ($user == "alfredo@gmail.com" && $clave == "usuario") {
        $consulta = 2 ;
      }


      if($consulta > 0 ){

        session_start();


        if($consulta == 1){
          echo 'view/admin/index.php';
        }else if($consulta == 2){
          echo 'view/usuario_estandar/index.php';
        }


      }else{
       
        echo 'error_3';
      }



    }

  }//-->

?>
