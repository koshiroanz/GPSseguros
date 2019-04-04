<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="Content-Language" content="es"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <link rel="stylesheet" href="Visual/Css/style.css">
  <link rel="stylesheet" href="Visual/Css/bootstrap.min.css">
  <link rel="stylesheet" href="Visual/Css/jquery-ui.min.css">
  <link rel="stylesheet" href="Visual/Css/jquery.datetimepicker.css">
  <link rel="stylesheet" href="Visual/Css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
  <link href="Visual/Imagenes/Gps/GPS.png" rel="shortcut icon" type="image"/>
  <title>GPS Seguros</title>
</head>
<body>
	<div class="container-fluid contenedor">
      <div class="col-xs-3 col-md-3 col-lg-2 contenedor-menu" style="padding-top:0px !important;">
        #MENU#
      </div>
      <div class="col-xs-9 col-md-9 col-lg-10 contenido">
        <div class="respuesta" style="margin-top:15px;">
          #CONTENIDO#
        </div>
      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
	</div>
  <script src="Visual/Js/jquery.js"></script>
  <script src="Visual/Js/menu_pedido.js"></script>
  <script src="Visual/Js/menu_impresion.js"></script>
  <script src="Visual/Js/carga_automatica.js"></script>
  <script>
    $(document).ready(function(){
      $("#dni").focusout(function(){
        var dniCliente = $("#dni").val();
        //alert(dniCliente);
        $.ajax({
          data: {existeDni:dniCliente},
          dataType: "JSON",
          type: "GET",
          url: "index.php?action=clientes",
          success: function(respuesta){
            if(respuesta == true){
              $(".contenedor").append('<div class="alert alert-danger" role="alert">Ya existe el Cliente</div>');
            }


              
            $.each(respuesta, function(id,value){
              
            });
          }
        });

      });

      $("#dni").focusin(function(){
        $(".c")        
      });

    });
  </script>
  <script src="Visual/Js/bootstrap.min.js"></script>
  <script src="Visual/Js/jquery.datetimepicker.full.min.js"></script>
  <script src="Visual/Js/datepickInicio.js"></script>
</body>
</html>