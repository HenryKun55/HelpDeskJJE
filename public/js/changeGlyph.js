$('.collapsed').click(function(){
      $(this).toggleClass('glyphicon glyphicon-minus glyphicon glyphicon-plus');


      for (var i = 0; i < 200; i++) {
        if($("ul#"+i).is(":visible")){
          $("ul#"+i).hide();
        }else{
          $("ul#"+i).show();
        }
      }

});
