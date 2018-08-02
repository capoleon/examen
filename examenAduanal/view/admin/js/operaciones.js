$('#guardar').click(function(){

  var form = $('#formulario_comentarios').serialize();

  $.ajax({
    method: 'POST',
    url: '../../controller/guardarController.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Advertencia', ' Por favor llenar los campos que se desea modificar', 'warning');
      }else{
        window.location.href = res ;
      }


    }
  });

});


