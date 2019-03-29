$(function() {
	 $( "#q" ).autocomplete({
	  source: "/relatorios/chamados/todos/pesquisa",
	  minLength: 3,
	  select: function(event, ui) {
	  	$('#q').val(ui.item.value);
			$('#client-id').val(ui.item.id);
	  }
	});
});
