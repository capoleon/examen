<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');


  class Usuario extends Conexion{

    

    public function registroMaterial($nombreH, $cantidad, $color, $proveedor){

      parent::conectar();


      $nombreH = parent::filtrar($nombreH);
      $color = parent::filtrar($color);

        parent::query('insert into materia_prima (nombre_hilo, cantidad, color, proveedores_id_proveedor) values("'.$nombreH.'", '.$cantidad.', "'.$color.'", '.$proveedor.')');

        echo 'ABC_materiaP/Consulta_materiaP.html';

    }//fin registroMaterial

    public function ActualizarMaterial($id_material, $nombreH, $cantidad, $color, $proveedor){

      parent::conectar();


      $nombreH = parent::filtrar($nombreH);
      $color = parent::filtrar($color);

        parent::query(' update materia_prima SET nombre_hilo = "'.$nombreH.'", cantidad= '.$cantidad.', color="'.$color.'", proveedores_id_proveedor= '.$proveedor.' WHERE numero_de_producto = '.$id_material.'');

        echo '../ABC_materiaP/Consulta_materiaP.html';

    }//fin registroMaterial




    public function registroUrdimbre($Num_carretes, $cant_urdido, $telar, $material_1, $total_cantidad_1){

      parent::conectar();      

        parent::query('update materia_prima set cantidad = '.$total_cantidad_1.' WHERE nombre_hilo = "'.$material_1.'"');

        parent::query('insert into almacen_urdido (Num_carretes, Cantidad_urdido, Telar, Material_Urdido_1) 
          values('.$Num_carretes.', '.$cant_urdido.', "'.$telar.'", "'.$material_1.'")');

        echo 'ABC_Urdido/Consulta_Urdido.html';


      
    }//fin registroUrdido


     public function registroUrdimbre2($Num_carretes, $cant_urdido, $telar, $material_1, $material_2, $total_cantidad_1, $total_cantidad2){

      parent::conectar();

    
      parent::query('update materia_prima set cantidad = '.$total_cantidad_1.' WHERE nombre_hilo = "'.$material_1.'"');

      parent::query('update materia_prima set cantidad = '.$total_cantidad2.' WHERE nombre_hilo = "'.$material_2.'"');

    parent::query('insert into almacen_urdido (Num_carretes, Cantidad_urdido, Telar, Material_Urdido_1, Material_Urdido_2) 
    values('.$Num_carretes.', '.$cant_urdido.', "'.$telar.'", "'.$material_1.'", "'.$material_2.'")');

        echo 'ABC_Urdido/Consulta_Urdido.html';


      

      
    }//fin registroUrdido2


  public function actualizarUrdimbre($id_material, $Num_carretes, $cant_urdido, $telar, $numero_material, $material_1, $material_2, $total_cantidad_1, $total_cantidad2){

      parent::conectar();


      if($numero_material == "1"){

        parent::query('update almacen_urdido SET Num_carretes = '.$Num_carretes.', Cantidad_urdido = '.$cant_urdido.', Telar = "'.$telar.'", Material_Urdido_1 = "'.$material_1.'" WHERE id_urdido = '.$id_material.'');

      }

      if ($numero_material == "2") {
        parent::query('update almacen_urdido SET Num_carretes = '.$Num_carretes.', Cantidad_urdido = '.$cant_urdido.', Telar = "'.$telar.'", Material_Urdido_1 = "'.$material_1.'", Material_Urdido_2 = "'.$material_2.'" WHERE id_urdido = '.$id_material.'');
      }

        echo '../ABC_Urdido/Consulta_Urdido.html';

    }//fin actualizarUrdimbre



    public function altaAlmacenProduccion($personal, $fecha, $modeloP, $tamanoP, $Numcolchas, $idmaterial,    $material_1, $total_1, $material_2, $total_2, $material_3, $total_3, $material_4, $total_4,$material_5, $total_5, $material_6, $total_6, $material_7, $total_7, $material_8, $total_8, $telar, $total_Urdido ){

      parent::conectar();


      $personal    = parent::filtrar($personal);

      $perC = "select id FROM personal WHERE nombre_completo = '".$personal."'";
      $datos = parent::query($perC);

        while($fila = $datos->fetch_array(MYSQLI_BOTH)){

          $personal = $fila['id'];

        }//fin while

      if($total_3 != 0 && $total_4 == 0){

    parent::query('update materia_prima set cantidad = '.$total_1.' WHERE nombre_hilo = "'.$material_1.'"');
    parent::query('update materia_prima set cantidad = '.$total_2.' WHERE nombre_hilo = "'.$material_2.'"');
    parent::query('update materia_prima set cantidad = '.$total_3.' WHERE nombre_hilo = "'.$material_3.'"');
    parent::query('update almacen_urdido set Cantidad_urdido= '.$total_Urdido.' WHERE Telar='.$telar.'');

    parent::query('insert into almacen_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

    parent::query('insert into hojas_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

      }

      if($total_4 != 0 && $total_5 == 0){

    parent::query('update materia_prima set cantidad = '.$total_1.' WHERE nombre_hilo = "'.$material_1.'"');
    parent::query('update materia_prima set cantidad = '.$total_2.' WHERE nombre_hilo = "'.$material_2.'"');
    parent::query('update materia_prima set cantidad = '.$total_3.' WHERE nombre_hilo = "'.$material_3.'"');
    parent::query('update materia_prima set cantidad = '.$total_4.' WHERE nombre_hilo = "'.$material_4.'"');
    parent::query('update almacen_urdido set Cantidad_urdido= '.$total_Urdido.' WHERE WHERE Telar='.$telar.'');

    parent::query('insert into almacen_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

    parent::query('insert into hojas_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

      }

      if($total_5 != 0 && $total_6 == 0){

    parent::query('update materia_prima set cantidad = '.$total_1.' WHERE nombre_hilo = "'.$material_1.'"');
    parent::query('update materia_prima set cantidad = '.$total_2.' WHERE nombre_hilo = "'.$material_2.'"');
    parent::query('update materia_prima set cantidad = '.$total_3.' WHERE nombre_hilo = "'.$material_3.'"');
    parent::query('update materia_prima set cantidad = '.$total_4.' WHERE nombre_hilo = "'.$material_4.'"');
    parent::query('update materia_prima set cantidad = '.$total_5.' WHERE nombre_hilo = "'.$material_5.'"');
    parent::query('update almacen_urdido set Cantidad_urdido= '.$total_Urdido.' WHERE WHERE Telar='.$telar.'');

    parent::query('insert into almacen_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

    parent::query('insert into hojas_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

      }

      if($total_6 != 0 && $total_7 == 0){

    parent::query('update materia_prima set cantidad = '.$total_1.' WHERE nombre_hilo = "'.$material_1.'"');
    parent::query('update materia_prima set cantidad = '.$total_2.' WHERE nombre_hilo = "'.$material_2.'"');
    parent::query('update materia_prima set cantidad = '.$total_3.' WHERE nombre_hilo = "'.$material_3.'"');
    parent::query('update materia_prima set cantidad = '.$total_4.' WHERE nombre_hilo = "'.$material_4.'"');
    parent::query('update materia_prima set cantidad = '.$total_5.' WHERE nombre_hilo = "'.$material_5.'"');
    parent::query('update materia_prima set cantidad = '.$total_6.' WHERE nombre_hilo = "'.$material_6.'"');
    parent::query('update almacen_urdido set Cantidad_urdido= '.$total_Urdido.' WHERE iWHERE Telar='.$telar.'');
    parent::query('insert into almacen_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

    parent::query('insert into hojas_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

      }

      if($total_7 != 0 && $total_8 == 0){

    parent::query('update materia_prima set cantidad = '.$total_1.' WHERE nombre_hilo = "'.$material_1.'"');
    parent::query('update materia_prima set cantidad = '.$total_2.' WHERE nombre_hilo = "'.$material_2.'"');
    parent::query('update materia_prima set cantidad = '.$total_3.' WHERE nombre_hilo = "'.$material_3.'"');
    parent::query('update materia_prima set cantidad = '.$total_4.' WHERE nombre_hilo = "'.$material_4.'"');
    parent::query('update materia_prima set cantidad = '.$total_5.' WHERE nombre_hilo = "'.$material_5.'"');
    parent::query('update materia_prima set cantidad = '.$total_6.' WHERE nombre_hilo = "'.$material_6.'"');
    parent::query('update materia_prima set cantidad = '.$total_7.' WHERE nombre_hilo = "'.$material_7.'"');
    parent::query('update almacen_urdido set Cantidad_urdido= '.$total_Urdido.' WHERE WHERE Telar='.$telar.'');

   parent::query('insert into almacen_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

   parent::query('insert into hojas_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

      }

      if($total_8 != 0){

    parent::query('update materia_prima set cantidad = '.$total_1.' WHERE nombre_hilo = "'.$material_1.'"');
    parent::query('update materia_prima set cantidad = '.$total_2.' WHERE nombre_hilo = "'.$material_2.'"');
    parent::query('update materia_prima set cantidad = '.$total_3.' WHERE nombre_hilo = "'.$material_3.'"');
    parent::query('update materia_prima set cantidad = '.$total_4.' WHERE nombre_hilo = "'.$material_4.'"');
    parent::query('update materia_prima set cantidad = '.$total_5.' WHERE nombre_hilo = "'.$material_5.'"');
    parent::query('update materia_prima set cantidad = '.$total_6.' WHERE nombre_hilo = "'.$material_6.'"');
    parent::query('update materia_prima set cantidad = '.$total_7.' WHERE nombre_hilo = "'.$material_7.'"');
    parent::query('update materia_prima set cantidad = '.$total_8.' WHERE nombre_hilo = "'.$material_8.'"');
    parent::query('update almacen_urdido set Cantidad_urdido= '.$total_Urdido.' WHERE WHERE Telar='.$telar.'');

   parent::query('insert into almacen_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

   parent::query('insert into hojas_produccion(cantidad, modelo_colcha, tamano_colcha, fecha_colcha, personal_id) VALUES('.$Numcolchas.', "'.$modeloP.'", "'.$tamanoP.'", "'.$fecha.'", '.$personal.')');

      }


   
    echo '<div class="alert alert-success">exito</div>';

    parent::cerrar();
    }//fin alta almacen produccion



    public function modeloCinta($personal, $fecha, $modelo_cinta, $tamano_cinta, $Mtotal, $restante_1, $numero_cinta, $total_1, $total_2, $total_3, $material_cinta_1, $material_cinta_2, $material_cinta_3){

      parent::conectar();

      $personal    = parent::filtrar($personal);

      $perC = "select id FROM personal WHERE nombre_completo = '".$personal."'";
      $datos = parent::query($perC);

        while($fila = $datos->fetch_array(MYSQLI_BOTH)){

          $personal = $fila['id'];

        }//fin while


     if($total_2 != 0){
    $ConsultaCC_2 ="select  cantidad from materia_prima WHERE nombre_hilo = '".$material_cinta_2."'";
    $ConsultaCR_2= parent::query($ConsultaCC_2);

    while ($fila = $ConsultaCR_2->fetch_array(MYSQLI_BOTH)) {

      $restante_2 = $fila['cantidad'] - $total_2;
      
    }
  }

  if($total_3 != 0){
     $ConsultaCC_3 ="select  cantidad from materia_prima WHERE nombre_hilo = '".$material_cinta_3."'";
    $ConsultaCR_3= parent::query($ConsultaCC_3);

    while ($fila = $ConsultaCR_3->fetch_array(MYSQLI_BOTH)) {

      $restante_3 = $fila['cantidad'] - $total_3;
      
    }
  }


    if($restante_2 >= 0 || $restante_3 >= 0){
        if ($total_1 != 0 and $total_2 == 0) {

        parent::query('update materia_prima set cantidad = '.$restante_1.' WHERE nombre_hilo = "'.$material_cinta_1.'"');


        parent::query('insert INTO almacen_cinta (modelo_cinta, Tamano_cinta, cantidad_hilo_cinta, rueda_cinta, personal_id_personal, Fecha)VALUES("'.$modelo_cinta.'", "'.$tamano_cinta.'", '.$Mtotal.', '.$numero_cinta.', '.$personal.', "'.$fecha.'")');

        parent::query('insert INTO hoja_cinta(modelo_cinta, Tamano_cinta, cantidad_hilo_cinta, rueda_cinta, personal_id_personal, Fecha)VALUES("'.$modelo_cinta.'", "'.$tamano_cinta.'", '.$Mtotal.', '.$numero_cinta.', '.$personal.', "'.$fecha.'")');

        echo '<div class="alert alert-success">exito</div>';
          
        }

        if($total_2 != 0 and $total_3 == 0){

          parent::query('update materia_prima set cantidad = '.$restante_1.' WHERE nombre_hilo = "'.$material_cinta_1.'"');

           parent::query('update materia_prima set cantidad = '.$restante_2.' WHERE nombre_hilo = "'.$material_cinta_2.'"');


        parent::query('insert INTO almacen_cinta (modelo_cinta, Tamano_cinta, cantidad_hilo_cinta, rueda_cinta, personal_id_personal, Fecha)VALUES("'.$modelo_cinta.'", "'.$tamano_cinta.'", '.$Mtotal.', '.$numero_cinta.', '.$personal.',  "'.$fecha.'")');

        parent::query('insert INTO hoja_cinta(modelo_cinta, Tamano_cinta, cantidad_hilo_cinta, rueda_cinta, personal_id_personal, Fecha)VALUES("'.$modelo_cinta.'", "'.$tamano_cinta.'", '.$Mtotal.', '.$numero_cinta.', '.$personal.', "'.$fecha.'")');

        echo '<div class="alert alert-success">exito</div>';

        }

        if ($total_3 !=0) {

           parent::query('update materia_prima set cantidad = '.$restante_1.' WHERE nombre_hilo = "'.$material_cinta_1.'"');

           parent::query('update materia_prima set cantidad = '.$restante_2.' WHERE nombre_hilo = "'.$material_cinta_2.'"');

           parent::query('update materia_prima set cantidad = '.$restante_3.' WHERE nombre_hilo = "'.$material_cinta_3.'"');


        parent::query('insert INTO almacen_cinta (modelo_cinta, Tamano_cinta, cantidad_hilo_cinta, rueda_cinta, personal_id_personal, Fecha)VALUES("'.$modelo_cinta.'", "'.$tamano_cinta.'", '.$Mtotal.', '.$numero_cinta.', '.$personal.',  "'.$fecha.'")');

        parent::query('insert INTO hoja_cinta(modelo_cinta, Tamano_cinta, cantidad_hilo_cinta, rueda_cinta, personal_id_personal, Fecha)VALUES("'.$modelo_cinta.'", "'.$tamano_cinta.'", '.$Mtotal.', '.$numero_cinta.', '.$personal.', "'.$fecha.'")');

        echo '<div class="alert alert-success">exito</div>';

          
        }
        }else{
        echo '<div class="alert alert-warning">Por favor de poner otro modelo, tamaño ó numero de colchas a coser  ya que no hay  del que pidio en el almacen </div>';
      }


     

    parent::cerrar();  
    }//fin modeloCinta


    public function modeloAcabadoCorte($personal, $fecha, $modelo_colcha, $tamano_colcha, $numero_colcha, $total, $id_modelo){

      parent::conectar();

      $personal    = parent::filtrar($personal);

      $perC = "select id FROM personal WHERE nombre_completo = '".$personal."'";
      $datos = parent::query($perC);

        while($fila = $datos->fetch_array(MYSQLI_BOTH)){

          $personal = $fila['id'];

        }//fin while

      parent::query('update almacen_produccion SET cantidad = '.$total.' WHERE id_colcha = '.$id_modelo.'');

      parent::query('insert INTO almacen_acabado_cortado(cantidad_acabado, modelo_acabado, tamano_colcha, Fecha, personal_id)VALUES('.$numero_colcha.', "'.$modelo_colcha.'", "'.$tamano_colcha.'", "'.$fecha.'", '.$personal.')');

      parent::query('insert INTO hoja_acabado_cortado(cantidad_acabado, modelo_acabado, tamano_colcha, Fecha, personal_id)VALUES('.$numero_colcha.', "'.$modelo_colcha.'", "'.$tamano_colcha.'", "'.$fecha.'", '.$personal.')');

      echo '<div class="alert alert-success">exito</div>';


}//fin modelo acabado corte

public function modeloAcabadoCostura($personal, $fecha, $modelo_colcha, $tamano_colcha, $number_coser,  $total_cinta, $id_cortado, $total_cortado, $id_cinta){

      parent::conectar();

      $personal    = parent::filtrar($personal);

      $perC = "select id FROM personal WHERE nombre_completo = '".$personal."'";
      $datos = parent::query($perC);

        while($fila = $datos->fetch_array(MYSQLI_BOTH)){

          $personal = $fila['id'];

        }//fin while

    parent::query('update almacen_cinta SET cantidad_hilo_cinta = '.$total_cinta.'  WHERE id_cinta='.$id_cinta.'');
   parent::query('update almacen_acabado_cortado SET cantidad_acabado ='.$total_cortado.' WHERE id_acabada='.$id_cortado.'');

      parent::query('insert INTO almacen_acabado_costura(Modelo_costura, Cantidad_costura, Tamano_costura, fecha, personal_id)VALUES("'.$modelo_colcha.'", '.$number_coser.', "'.$tamano_colcha.'", "'.$fecha.'",'.$personal.')');

      parent::query('insert INTO hojas_acabado_costura(Modelo_costura, Cantidad_costura, Tamano_costura, fecha, personal_id)VALUES("'.$modelo_colcha.'", '.$number_coser.', "'.$tamano_colcha.'", "'.$fecha.'",'.$personal.')');

      echo '<div class="alert alert-success">exito</div>';


}//fin modelo acabado costura


public function modeloEmpaquetado($personal, $fecha, $id_acabado, $modelo_colcha, $tamano_colcha, $number_empaquetar, $disponibilidad){

      parent::conectar();

      $personal    = parent::filtrar($personal);

      $perC = "select id FROM personal WHERE nombre_completo = '".$personal."'";
      $datos = parent::query($perC);

        while($fila = $datos->fetch_array(MYSQLI_BOTH)){

          $personal = $fila['id'];

        }//fin while

      parent::query('update almacen_acabado_costura SET Cantidad_costura= '.$disponibilidad.' WHERE id_acabado_costura= '.$id_acabado.'');

      parent::query('insert INTO empaquetado(modelo_empaquetado, tamano_empaquetado, Cantidad_empaquetado, Fecha, personal_id)VALUES("'.$modelo_colcha.'", "'.$tamano_colcha.'", '.$number_empaquetar.', "'.$fecha.'", '.$personal.')');

      parent::query('insert INTO hoja_empaquetado(modelo_empaquetado, tamano_empaquetado, Cantidad_empaquetado, Fecha, personal_id)VALUES("'.$modelo_colcha.'", "'.$tamano_colcha.'", '.$number_empaquetar.', "'.$fecha.'", '.$personal.')');

      echo '<div class="alert alert-success">exito</div>';


}//fin modelo Empaquetado

  }//-->


?>


