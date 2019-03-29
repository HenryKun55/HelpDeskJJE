function getr() {

    var id = $( "#responsible-department option:selected" ).val();

    $.get("/chamados/novo/getresponsibles/" + id, function(result){

      $("#responsible option").remove();

      $("#responsible").append('<option value="">Selecione...</option>');

      $.each(result, function(index, value){

        $("#responsible").append('<option class'+value.name+' value='+value.id+'>'+value.name+'</option>');

      });

    });

}
