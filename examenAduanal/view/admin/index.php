<?php
  
  session_start();

  require_once('../../controller/guardarController.php');

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
  <br>
  <center>

<hr>
</hr>
</center>
<div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-5 ">

    </br>

<!--comienza tabla de navegacion-->


<div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12 ">        
<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <ul class="nav navbar-nav">
      <li><a href="./"><i class="fa fa-home"></i>
      Hola administrador Jose Luis</a>
      </li>
  </ul>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
    <ul class="nav navbar-nav ">

      <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp; <b class="caret"></b></a>

        <ul class="dropdown-menu">
          <li><a href="../../controller/cerrarSesion.php">Salir</a></li>
        </ul>
      </li>
    </ul>
</nav>


</div></div></div>
<!--Termina tabla de navegacion-->

<form id="formulario_comentarios">
          <fieldset>

<table class="table table-hover">
  <tbody>
 
  <!-- Aplicadas en las celdas (<td> o <th>) -->
  <tr>

      <td class="success">
      <div class="input-group-addon">Mision</div><br>

     <textarea class="form-control" name="mision">Alimentos deliciosos y nutritivos en las manos de todos. </textarea> <br>

  
      </td> 

      <td class="active">
           <div class="input-group-addon">Vision</div><br>

      <textarea class="form-control" name="vision">En 2020 transformamos la industria de la panificación y expandimos nuestro liderazgo global para servir mejor a los consumidores. </textarea><br>

      </td> 

      <td class="success">
     <div class="input-group-addon">Valores</div><br>

      <textarea class="form-control" name="mision">La seguridad de nuestros colaboradores va por delante.
Seguimos nuestra regla de oro tratándonos con respeto, justicia, confianza y afecto. Todos tenemos potencial: fomentamos el desarrollo integral de nuestros colaboradores. La diversidad nos enriquece, la inclusión nos fortalece.
Somos una comunidad

Somos una misma empresa global en cualquier lugar.
Nos apasiona lo que hacemos, y se nota. Colaboramos para romper silos. Hacemos el trabajo divertido y celebramos nuestros logros.
Conseguimos resultados

Pensamos como dueños, cuidando el hoy y el mañana. Empoderamos, pedimos y rendimos cuentas. Somos ágiles descubriendo y capturando oportunidades.</textarea><br>
      </td> 

  </tr>



</tbody>
</table>



 
   
<hr>

</div></div></div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/operaciones.js"></script>

  </body>
</html>
