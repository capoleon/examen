<?php

  session_start();

    if($_SESSION['cargo'] == 1){
    header('../view/admin/index.php');
  }else if($_SESSION['cargo'] == 2){
    header('../view/produccion/index.php');
  }else if($_SESSION['cargo'] == 3){
    header('../view/almacenista/index.php');
  }else if($_SESSION['cargo'] == 4){
    header('../view/acabado/index.php');
  }else if($_SESSION['cargo'] == 5){
    header('../view/transportista/index.php');
  }else if($_SESSION['cargo'] == 0){
  	header('location:index.php');
  	}

 ?>
