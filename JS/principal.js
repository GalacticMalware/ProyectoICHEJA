jQuery(document).on('modal','#login',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'php/login.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                  $('.botonlg').val('Validando....');
                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if (!respuesta.error) {
                  if (respuesta.tipo=='Admin') {
                    location='quimica.html'/*'main_app/Admin/admin.php'*/;
                  }else if (respuesta.tipo=='Usuario') {
                    location='main_app/Usuario/usuario.php';
                  }
                }else {
                  $('.error').slideDown('slow');
                  setTimeout(function(){
                  $('.error').slideUp('slow');
                },3000);
                $('.botonlg').val('Iniciar Secion');
                }
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });
