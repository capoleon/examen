<?php

  session_start();

  if($consulta_admin == 1){
    header('../view/admin/index.php');
  }else if($consulta_user == 2){
    header('../view/usuario_estandar/index.php');
  }else{
  	header('location:../index.php');
  	}
 
  

 ?>
