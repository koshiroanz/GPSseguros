$(document).ready(function(){
  $('.contenedor-menu li:has(ul)').click(function(e){
    if($(this).hasClass('activo')){
      $(this).children('ul').slideUp();
      $(this).removeClass('activo');
    }else{
      $(this).children('ul').slideUp();
      $(this).addClass('activo');
      $(this).children('ul').slideDown();
    }
  });
});