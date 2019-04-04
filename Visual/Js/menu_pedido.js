function consultar(cant){
  $.ajax({
    async:  true, 
    type: "GET",
    data: {cant:cant},
    url: "index.php?action=notificaciones",
    dataType:"json",

     success: function(data){
      avisar(data);
    }

  });
}

function avisar(data){
  var resp = eval("(" + data + ")");
  $(".badge").html(resp);
}

$(document).ready(function(){
    consultar(0);
});