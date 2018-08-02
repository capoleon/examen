<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');


  class Usuario extends Conexion{

    public function registroUsuario($name, $telefono, $rfc, $email,  $direccion, $nick, $clave, $cargo){

      parent::conectar();

      $name       = parent::filtrar($name);
     // $telefono   = parent::filtrar($telefono);
    // $rfc        = parent::filtrar($rfc);
      //$email      = parent::filtrar($email);
     // $usuario    = parent::filtrar($usuario);
      //$clave      = parent::filtrar($clave);
     // $cargo      = parent::filtrar($cargo);


      // validar que el usuario no exito
      $verificarUsuario = parent::verificarRegistros('select id from personal where usuario="'.$nick.'" ');


      if($verificarUsuario > 0){
        echo 'error_3';
      }else{

        parent::query('insert into personal(nombre_completo, telefono, rfc, email, direccion, usuario, clave, cargo) values("'.$name.'","'.$telefono.'", "'.$rfc.'", "'.$email.'", "'.$direccion.'","'.$nick.'", MD5("'.$clave.'"), '.$cargo.')');

        if ($cargo == 1) {
        session_start();

        $_SESSION['nombre_completo'] = $name;
        $_SESSION['cargo']  = $cargo;

        echo 'index.php';

        }else if ($cargo == 2) {

          session_start();

        $_SESSION['nombre_completo'] = $name;
        $_SESSION['cargo']  = $cargo;

        echo '../produccion/index.php';

        }else if ($cargo == 3) {
          
          session_start();

        $_SESSION['nombre_completo'] = $name;
        $_SESSION['cargo']  = $cargo;

        echo '../almacenista/index.php';
        }else if ($cargo == 4) {
          
          session_start();

        $_SESSION['nombre_completo'] = $name;
        $_SESSION['cargo']  = $cargo;

        echo '../acabado/index.php';
        }else if ($cargo == 5) {
          
          session_start();

        $_SESSION['nombre_completo'] = $name;
        $_SESSION['cargo']  = $cargo;

        echo '../transportista/index.php';
        }

        
      }

      parent::cerrar();
    }


   public function actualizarUsuario($id, $name, $telefono, $rfc, $email,  $direccion, $nick, $clave, $cargo){

        parent::conectar();


      $name = parent::filtrar($name);

        parent::query('update personal set  nombre_completo = "'.$name.'", telefono = '.$telefono.',
        RFC = "'.$rfc.'", email = "'.$email.'", direccion = "'.$direccion.'", usuario = "'.$nick.'",
        clave = MD5("'.$clave.'"), cargo = '.$cargo.' where id ='.$id.'');

        echo '../ABC_usuarios/consulta_usuarios.html';

        

        }//fin actualizar

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


    public function registroProveedor($nombreP, $telefono_A, $telefono_E, $name_E, $RFC_E, $direccion, $producto){

      parent::conectar();


      $nombreP    = parent::filtrar($nombreP);
      $name_E     = parent::filtrar($name_E);
      $producto   = parent::filtrar($producto);

        parent::query('insert into proveedores (nombre_proveedor, telefono_agenteV, telefono_empresa, nombre_empresa, rfc_empresa, direccion, producto) values("'.$nombreP.'", "'.$telefono_A.'", "'.$telefono_E.'", "'.$name_E.'", "'.$RFC_E.'" , "'.$direccion.'" , "'.$producto.'")');

        echo 'ABC_proveedores/Proveedores_tabla.html';

    }//fin registroProveedor


     public function ActualizarProveedor($id_proveedor, $nombreP, $telefono_A, $telefono_E, $name_E, $RFC_E, $direccion, $producto){

      parent::conectar();


      $nombreP    = parent::filtrar($nombreP);
      $name_E     = parent::filtrar($name_E);
      $producto   = parent::filtrar($producto);

        parent::query(' update proveedores set  nombre_proveedor = "'.$nombreP.'", telefono_agenteV = "'.$telefono_A.'", telefono_empresa = "'.$telefono_E.'", nombre_empresa = "'.$name_E.'", rfc_empresa = "'.$RFC_E.'", direccion = "'.$direccion.'", producto = "'.$producto.'" WHERE id_proveedor = '.$id_proveedor.'');



        echo '../ABC_proveedores/Proveedores_tabla.html';

    }//fin ActualizarProveedores


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


    public function registroModelo($nombre_Modelo, $tamaño, $Material_urdido_1, $cantidad_Urdido_1, $Material_urdido_2, $cantidad_Urdido_2, $cantidad_Material, $material_1, $cantidad_1, $material_2, $cantidad_2, $material_3, $cantidad_3, $material_4, $cantidad_4, $material_5, $cantidad_5, $material_6, $cantidad_6, $material_7, $cantidad_7, $material_8, $cantidad_8 ){

      parent::conectar();

      $nombre_Modelo =parent::filtrar($nombre_Modelo);
      $tamaño        =parent::filtrar($tamaño);

      


      if ($cantidad_Material == 1) {
           parent::query('insert into modelo (nombre_de_modelos, tamano_de_modelos, Material_1, cantidad_1, Material_2, cantidad_2, Material_3,  cantidad_3, Material_urdido_1, cantidad_Urdido_1, Material_urdido_2, cantidad_Urdido_2 ) values("'.$nombre_Modelo.'", "'.$tamaño.'", "'.$material_1.'", '.$cantidad_1.', "'.$material_2.'", '.$cantidad_2.', "'.$material_3.'", '.$cantidad_3.', "'.$Material_urdido_1.'", '.$cantidad_Urdido_1.', "'.$Material_urdido_2.'", '.$cantidad_Urdido_2.')');

        echo'ABC_Modelo/Consulta_modelo.html';

      }else if($cantidad_Material == 2){

        parent::query('insert into modelo (nombre_de_modelos, tamano_de_modelos, Material_1, cantidad_1, Material_2, cantidad_2, Material_3,  cantidad_3, Material_4, cantidad_4, Material_urdido_1, cantidad_Urdido_1, Material_urdido_2, cantidad_Urdido_2) values("'.$nombre_Modelo.'", "'.$tamaño.'", "'.$material_1.'", '.$cantidad_1.', "'.$material_2.'", '.$cantidad_2.', "'.$material_3.'", '.$cantidad_3.', "'.$material_4.'", '.$cantidad_4.', "'.$Material_urdido_1.'", '.$cantidad_Urdido_1.', "'.$Material_urdido_2.'", '.$cantidad_Urdido_2.')');

        echo'ABC_Modelo/Consulta_modelo.html';

      }else if($cantidad_Material == 3){

         parent::query('insert into modelo (nombre_de_modelos, tamano_de_modelos, Material_1, cantidad_1, Material_2,  cantidad_2, Material_3, cantidad_3, Material_4, cantidad_4, Material_5, cantidad_5, Material_urdido_1, cantidad_Urdido_1, Material_urdido_2, cantidad_Urdido_2) values("'.$nombre_Modelo.'", "'.$tamaño.'", "'.$material_1.'", '.$cantidad_1.', "'.$material_2.'", '.$cantidad_2.', "'.$material_3.'", '.$cantidad_3.', "'.$material_4.'", '.$cantidad_4.', "'.$material_5.'", '.$cantidad_5.', "'.$Material_urdido_1.'", '.$cantidad_Urdido_1.', "'.$Material_urdido_2.'", '.$cantidad_Urdido_2.')');

        echo'ABC_Modelo/Consulta_modelo.html';



      }else if($cantidad_Material == 4){

        parent::query('insert into modelo (nombre_de_modelos, tamano_de_modelos, Material_1, cantidad_1, Material_2, cantidad_2, Material_3, cantidad_3, Material_4, cantidad_4, Material_5, cantidad_5, Material_6, cantidad_6, Material_urdido_1, cantidad_Urdido_1, Material_urdido_2, cantidad_Urdido_2) values("'.$nombre_Modelo.'", "'.$tamaño.'", "'.$material_1.'", '.$cantidad_1.', "'.$material_2.'", '.$cantidad_2.', "'.$material_3.'", '.$cantidad_3.', "'.$material_4.'", '.$cantidad_4.', "'.$material_5.'", '.$cantidad_5.', "'.$material_6.'", '.$cantidad_6.', "'.$Material_urdido_1.'", '.$cantidad_Urdido_1.', "'.$Material_urdido_2.'", '.$cantidad_Urdido_2.')');

        echo'ABC_Modelo/Consulta_modelo.html';

      }else if($cantidad_Material == 5){

        parent::query('insert into modelo (nombre_de_modelos, tamano_de_modelos, Material_1, cantidad_1, Material_2, cantidad_2, Material_3,  cantidad_3, Material_4, cantidad_4, Material_5, cantidad_5, Material_6, cantidad_6, Material_7, cantidad_7, Material_urdido_1, cantidad_Urdido_1, Material_urdido_2, cantidad_Urdido_2) values("'.$nombre_Modelo.'", "'.$tamaño.'", "'.$material_1.'", '.$cantidad_1.', "'.$material_2.'", '.$cantidad_2.', "'.$material_3.'", '.$cantidad_3.', "'.$material_4.'", '.$cantidad_4.', "'.$material_5.'", '.$cantidad_5.', "'.$material_6.'", '.$cantidad_6.', "'.$material_7.'", '.$cantidad_7.', "'.$Material_urdido_1.'", '.$cantidad_Urdido_1.', "'.$Material_urdido_2.'", '.$cantidad_Urdido_2.')');

        echo'ABC_Modelo/Consulta_modelo.html';

      }else if($cantidad_Material == 6){

        parent::query('insert into modelo (nombre_de_modelos, tamano_de_modelos, Material_1, cantidad_1, Material_2, cantidad_2, Material_3,  cantidad_3, Material_4, cantidad_4, Material_5, cantidad_5, Material_6, cantidad_6, Material_7, cantidad_7, Material_8, cantidad_8, Material_urdido_1, cantidad_Urdido_1, Material_urdido_2, cantidad_Urdido_2) values("'.$nombre_Modelo.'", "'.$tamaño.'", "'.$material_1.'", '.$cantidad_1.', "'.$material_2.'", '.$cantidad_2.', "'.$material_3.'", '.$cantidad_3.', "'.$material_4.'", '.$cantidad_4.', "'.$material_5.'", '.$cantidad_5.', "'.$material_6.'", '.$cantidad_6.', "'.$material_7.'", '.$cantidad_7.', "'.$material_8.'", '.$cantidad_8.', "'.$Material_urdido_1.'", '.$cantidad_Urdido_1.', "'.$Material_urdido_2.'", '.$cantidad_Urdido_2.')');

        echo'ABC_Modelo/Consulta_modelo.html';

        }
      
    }//fin registroModelo

    public function ActualizarModelo($id_modelo, $nombre_Modelo, $tamaño, $Material_urdido_1, $cantidad_Urdido_1, $Material_urdido_2, $cantidad_Urdido_2, $cantidad_Material, $material_1, $cantidad_1, $material_2, $cantidad_2, $material_3, $cantidad_3, $material_4, $cantidad_4, $material_5, $cantidad_5, $material_6, $cantidad_6, $material_7, $cantidad_7, $material_8, $cantidad_8){

      parent::conectar();

      $nombre_Modelo =parent::filtrar($nombre_Modelo);
      $tamaño        =parent::filtrar($tamaño);

      if($cantidad_Material == 1){
        parent::query('update modelo SET nombre_de_modelos = "'.$nombre_Modelo.'", tamano_de_modelos = "'.$tamaño.'", Material_1 = "'.$material_1.'", cantidad_1= '.$cantidad_1.', Material_2="'.$material_2.'", cantidad_2='.$cantidad_2.', Material_3="'.$material_3.'", cantidad_3='.$cantidad_3.', Material_urdido_1 ="'.$Material_urdido_1.'", cantidad_Urdido_1= '.$cantidad_Urdido_1.', Material_urdido_2="'.$Material_urdido_2.'", cantidad_Urdido_2='.$cantidad_Urdido_2.' WHERE id_modelo='.$id_modelo.'');

      }else if($cantidad_Material == 2){

        parent::query('update modelo SET nombre_de_modelos = "'.$nombre_Modelo.'", tamano_de_modelos = "'.$tamaño.'", Material_1 = "'.$material_1.'", cantidad_1= '.$cantidad_1.', Material_2="'.$material_2.'", cantidad_2='.$cantidad_2.', Material_3="'.$material_3.'", cantidad_3='.$cantidad_3.', Material_4="'.$material_4.'", cantidad_4='.$cantidad_4.', Material_urdido_1 ="'.$Material_urdido_1.'", cantidad_Urdido_1= '.$cantidad_Urdido_1.', Material_urdido_2="'.$Material_urdido_2.'", cantidad_Urdido_2='.$cantidad_Urdido_2.' WHERE id_modelo='.$id_modelo.'');

        

      }else if($cantidad_Material == 3){

      parent::query('update modelo SET nombre_de_modelos = "'.$nombre_Modelo.'", tamano_de_modelos = "'.$tamaño.'", Material_1 = "'.$material_1.'", cantidad_1= '.$cantidad_1.', Material_2="'.$material_2.'", cantidad_2='.$cantidad_2.', Material_3="'.$material_3.'", cantidad_3='.$cantidad_3.', Material_4="'.$material_4.'", cantidad_4='.$cantidad_4.', Material_5="'.$material_5.'", cantidad_5='.$cantidad_5.', Material_urdido_1 ="'.$Material_urdido_1.'", cantidad_Urdido_1= '.$cantidad_Urdido_1.', Material_urdido_2="'.$Material_urdido_2.'", cantidad_Urdido_2='.$cantidad_Urdido_2.' WHERE id_modelo='.$id_modelo.'');



      }else if($cantidad_Material == 4){

     parent::query('update modelo SET nombre_de_modelos = "'.$nombre_Modelo.'", tamano_de_modelos = "'.$tamaño.'", Material_1 = "'.$material_1.'", cantidad_1= '.$cantidad_1.', Material_2="'.$material_2.'", cantidad_2='.$cantidad_2.', Material_3="'.$material_3.'", cantidad_3='.$cantidad_3.', Material_4="'.$material_4.'", cantidad_4='.$cantidad_4.', Material_5="'.$material_5.'", cantidad_5='.$cantidad_5.', Material_6="'.$material_6.'", cantidad_6='.$cantidad_6.', Material_urdido_1 ="'.$Material_urdido_1.'", cantidad_Urdido_1= '.$cantidad_Urdido_1.', Material_urdido_2="'.$Material_urdido_2.'", cantidad_Urdido_2='.$cantidad_Urdido_2.' WHERE id_modelo='.$id_modelo.'');


      }else if($cantidad_Material == 5){

        parent::query('update modelo SET nombre_de_modelos = "'.$nombre_Modelo.'", tamano_de_modelos = "'.$tamaño.'", Material_1 = "'.$material_1.'", cantidad_1= '.$cantidad_1.', Material_2="'.$material_2.'", cantidad_2='.$cantidad_2.', Material_3="'.$material_3.'", cantidad_3='.$cantidad_3.', Material_4="'.$material_4.'", cantidad_4='.$cantidad_4.', Material_5="'.$material_5.'", cantidad_5='.$cantidad_5.', Material_6="'.$material_6.'", cantidad_6='.$cantidad_6.', Material_7="'.$material_7.'", cantidad_7='.$cantidad_7.', Material_urdido_1 ="'.$Material_urdido_1.'", cantidad_Urdido_1= '.$cantidad_Urdido_1.', Material_urdido_2="'.$Material_urdido_2.'", cantidad_Urdido_2='.$cantidad_Urdido_2.' WHERE id_modelo='.$id_modelo.'');


      }else if($cantidad_Material == 6){

        parent::query('update modelo SET nombre_de_modelos = "'.$nombre_Modelo.'", tamano_de_modelos = "'.$tamaño.'", Material_1 = "'.$material_1.'", cantidad_1= '.$cantidad_1.', Material_2="'.$material_2.'", cantidad_2='.$cantidad_2.', Material_3="'.$material_3.'", cantidad_3='.$cantidad_3.', Material_4="'.$material_4.'", cantidad_4='.$cantidad_4.', Material_5="'.$material_5.'", cantidad_5='.$cantidad_5.', Material_6="'.$material_6.'", cantidad_6='.$cantidad_6.', Material_7="'.$material_7.'", cantidad_7='.$cantidad_7.', Material_8="'.$material_8.'", cantidad_8='.$cantidad_8.', Material_urdido_1 ="'.$Material_urdido_1.'", cantidad_Urdido_1= '.$cantidad_Urdido_1.', Material_urdido_2="'.$Material_urdido_2.'", cantidad_Urdido_2='.$cantidad_Urdido_2.' WHERE id_modelo='.$id_modelo.'');

      }

      echo'../ABC_Modelo/Consulta_modelo.html';

    }//fin ActualizarModelo



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


 public function registroCinta($modelo_cinta, $tamano_cinta, $numero_cinta, $material_cinta_1, 
          $cantidad_cinta_1, $material_cinta_2, $cantidad_cinta_2, $material_cinta_3, $cantidad_cinta_3){

      parent::conectar();

      if($numero_cinta == 1) {
       parent::query('insert into modelo_cinta(modelo_cinta_colcha, Material_cinta_1, Cantidad_cinta_1, Tamano_colcha_cinta) values("'.$modelo_cinta.'", "'.$material_cinta_1.'", "'.$cantidad_cinta_1.'", "'.$tamano_cinta.'")');

        echo 'ABC_Cintas/Consulta_cinta.html';


      }

      if($numero_cinta == 2) {
    parent::query('insert into modelo_cinta(modelo_cinta_colcha, Material_cinta_1, Cantidad_cinta_1, Material_cinta_2, Cantidad_cinta_2, Tamano_colcha_cinta) values("'.$modelo_cinta.'", "'.$material_cinta_1.'", "'.$cantidad_cinta_1.'", "'.$material_cinta_2.'", "'.$cantidad_cinta_2.'", "'.$tamano_cinta.'")');

        echo 'ABC_Cintas/Consulta_cinta.html';


      }

      if($numero_cinta == 3) {
     parent::query('insert into  modelo_cinta(modelo_cinta_colcha, Material_cinta_1, Cantidad_cinta_1, Material_cinta_2,  Cantidad_cinta_2, Material_cinta_3,  Cantidad_cinta_3, Tamano_colcha_cinta) values("'.$modelo_cinta.'", "'.$material_cinta_1.'", "'.$cantidad_cinta_1.'", "'.$material_cinta_2.'",  "'.$cantidad_cinta_2.'", "'.$material_cinta_3.'", "'.$cantidad_cinta_3.'", "'.$tamano_cinta.'")');

        echo 'ABC_Cintas/Consulta_cinta.html';
      }

        

    }//fin registroCinta


    public function ActualizacionCinta($id_cinta, $modelo_cinta, $tamano_cinta, $numero_cinta, $material_cinta_1, $cantidad_cinta_1, $material_cinta_2, $cantidad_cinta_2, $material_cinta_3, $cantidad_cinta_3){

      parent::conectar();

      if($numero_cinta == 1) {

      parent::query('update modelo_cinta SET modelo_cinta_colcha="'.$modelo_cinta.'", Material_cinta_1="'.$material_cinta_1.'", Cantidad_cinta_1='.$cantidad_cinta_1.', Tamano_colcha_cinta="'.$tamano_cinta.'" WHERE id_Modelo_cinta='.$id_cinta.'');


      }

      if($numero_cinta == 2) {
    
    parent::query('update modelo_cinta SET modelo_cinta_colcha="'.$modelo_cinta.'", Material_cinta_1="'.$material_cinta_1.'", Cantidad_cinta_1='.$cantidad_cinta_1.', Material_cinta_2="'.$material_cinta_2.'", Cantidad_cinta_2='.$cantidad_cinta_2.', Tamano_colcha_cinta="'.$tamano_cinta.'" WHERE id_Modelo_cinta='.$id_cinta.'');


      }

      if($numero_cinta == 3) {
     parent::query('update modelo_cinta SET modelo_cinta_colcha="'.$modelo_cinta.'", Material_cinta_1="'.$material_cinta_1.'", Cantidad_cinta_1='.$cantidad_cinta_1.', Material_cinta_2="'.$material_cinta_2.'", Cantidad_cinta_2='.$cantidad_cinta_2.', Material_cinta_3="'.$material_cinta_3.'", Cantidad_cinta_3='.$cantidad_cinta_3.', Tamano_colcha_cinta="'.$tamano_cinta.'" WHERE id_Modelo_cinta='.$id_cinta.'');

        
      }

        echo '../ABC_Cintas/Consulta_cinta.html';

    }//fin ActualizacionCinta


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


