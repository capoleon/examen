<?php
  session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Usuario Estandar</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
  
    <link rel="stylesheet" href="css/font-awesome.min.css">
  
    <link rel="stylesheet" href="css/sweetalert.css">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
  <br>
  <center>

</center>
<div class="container">
      <div class="row">
       <div class="col-md-12 col-xs-5 ">
          <!-- Margen superior (css personalizado )-->
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
     Bienvenido: Alfredo Soto</a>
      </li>
  </ul>
 
 
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

<table class="table table-hover">
  <tbody>

  <table class="table table-hover">
  <tbody>

  <tr>

      <td class="success">
      <div class="input-group-addon">Mision</div><br>

      Alimentos deliciosos y nutritivos en las manos de todos.

  
      </td> 

      <td class="active">
           <div class="input-group-addon">Vision</div><br>

      En 2020 transformamos la industria de la panificación y expandimos nuestro liderazgo global para servir mejor a los consumidores.

      </td> 

      <td class="success">
     <div class="input-group-addon">Valores</div><br>
La seguridad de nuestros colaboradores va por delante.
Seguimos nuestra regla de oro tratándonos con respeto, justicia, confianza y afecto. Todos tenemos potencial: fomentamos el desarrollo integral de nuestros colaboradores. La diversidad nos enriquece, la inclusión nos fortalece.

Somos una comunidad

Somos una misma empresa global en cualquier lugar.
Nos apasiona lo que hacemos, y se nota. Colaboramos para romper silos. Hacemos el trabajo divertido y celebramos nuestros logros.
Conseguimos resultados

Pensamos como dueños, cuidando el hoy y el mañana. Empoderamos, pedimos y rendimos cuentas. Somos ágiles descubriendo y capturando oportunidades.
      </td> 

  </tr>
</tbody>
</table>


<div class="row">
<div class="col-md-12">
<hr>
</div></div></div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/operaciones.js"></script>

  </body>
</html>
