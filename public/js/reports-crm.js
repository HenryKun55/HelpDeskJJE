$('#status-field').on('change', function(){
  var uri = $(this).val();
  window.history.pushState(history.go(0), 'HelpDesk', uri);
});
