<?php
if(isset($mision) and isset($vision) and isset($valores)){
  $mision       = $_POST['mision'];
  $vision       = $_POST['vision'];
  $valores      = $_POST['valores'];



  if(empty($mision) and empty($vision) and empty($valores) ){

    echo 'error_1';

  }
}
?>