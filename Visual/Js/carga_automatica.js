$(document).ready(function(){
  $("#select_marca").change(function(){
    var marca = $("#select_marca option:selected").val(), select_modelo = $("#select_modelo");

    $.ajax({
      data: {marca:marca},
      dataType: "JSON",
      type: "GET",
      url: "index.php?action=vehiculos",
      success: function(respuesta){
        select_modelo.empty();
        $("#select_modelo").append('<option> Seleccione una opción... </option>');
        $.each(respuesta, function(id,value){
          $("#select_modelo").append('<option value="'+id+'" name="modelo">'+value+'</option>');
        });
      }
    });
  });

  $("#select_modelo").change(function(){
    var modelo = $("#select_modelo option:selected").val(), select_carroceria = $("#select_carroceria");
    $.ajax({
      data: {modelo:modelo},
      dataType: "JSON",
      type: "GET",
      url: "index.php?action=vehiculos",
      success: function(respuesta){
        select_carroceria.empty();
        $("#select_carroceria").append('<option> Seleccione una opción... </option>');
        $.each(respuesta, function(id,value){
          $("#select_carroceria").append('<option value="'+id+'" name="carroceria">'+value+'</option>');
        });
      }
    });
  });

  $("#select_compSeguro").change(function(){
    var compSeguro = $("#select_compSeguro option:selected").val(), select_cobertura = $("#select_cobertura");
    $.ajax({
      data: {compSeguro:compSeguro},
      dataType: "JSON",
      type: "GET",
      url: "index.php?action=polizas",
      success: function(respuesta){
        select_cobertura.empty();
        $("#select_cobertura").append('<option> Seleccione una opción... </option>');
        $.each(respuesta, function(id,value){
          $("#select_cobertura").append('<option value="'+id+'" name="cobertura">'+value+'</option>');
        });
      }
    });
  });

});
