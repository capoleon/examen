<?php

  session_start();

  if($_SESSION['cargo'] == 1){
    header('../view/admin/index.php');
  }else if($_SESSION['cargo'] == 2){
    header('../view/user/index.php');
  }

 ?>
