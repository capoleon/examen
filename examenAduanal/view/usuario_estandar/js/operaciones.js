$('#material').click(function(){

  var form = $('#registro_material').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/materiaController.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', ' Por favor llenar campos obligatorios', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'La cantidad que ingreso no es valida recuerde solo numeros y es medida por KG', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El usuario que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        window.location.href = res ;
      }


    }
  });

});


$('#urdido').click(function(){

  var form = $('#registro_urdido').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/UrdidoController.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', ' Por favor llenar campos obligatorios', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'El numero de carretes que ingreso o cantidad es erronio solo numeros por favor', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'No hay esa cantidad que deseas de hilo', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        window.location.href = res ;
      }


    }
  });

});
