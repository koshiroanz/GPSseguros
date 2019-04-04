<script>
    $(document).ready(function(){
      var action = 'menu';
      $.ajax({
        async:  true,
        type: "GET",
        data: {action:action},
        url: "index.php",
        dataType:"html",

        success: function(data){
          if(data == "1"){
            $("#pagos").remove();
            //$("#pedidos").remove();
            $("#productor").remove();
            $("#otros").remove();
            $(".elei").css({
              "padding-top":"15px",
              "padding-bottom":"15px"
            });
          }else if(data == "2"){
            $("#productor").remove();
            $("#otros").remove();
            $(".elei").css({
              "padding-top":"10px",
              "padding-bottom":"10px"
            });
          }
        }
      });
      
    });    
  </script>