$('#search-button').on('click', function() {

  var st = $('#solicitation-status').val().toLowerCase();     //status
  var id = $('#initial-date').val();                          //initial date
  var fd = $('#final-date').val();                            //final date
  var cn = $('#q').val();                                     //client name
  var rs = $('#responsible :selected').text();                //responsible
  var ri = $('#responsible').val();                           //responsible id
  var ci = $('#client-id').val();                             //client id
  var searchType = '00';
  var uri = '/relatorios/chamados/';

  if ((id == '' || fd == '') && (cn == '')) {
    ri = ri == '' ? '00' : ri;
    uri += st + '/00/00/00/' + ri + '/' + searchType;
  }
  if ((id != '' && fd != '') && (cn == '')) {
    searchType = '01';
    ri = ri == '' ? '00' : ri;
    ci = cn == '' ? '00' : ci;
    uri += st + '/' + id + '/' + fd + '/' + ci + '/' + ri + '/' + searchType;
  }
  if ((id == '' || fd == '') && (cn != '')) {
    searchType = '02';
    ri = ri == '' ? '00' : ri;
    ci = cn == '' ? '00' : ci;
    uri += st + '/00/00/' + ci + '/' + ri + '/' + searchType;
  }

  if ((id != '' && fd != '') && (cn != '')) {
    searchType = '03';
    ri = ri == '' ? '00' : ri;
    ci = cn == '' ? '00' : ci;
    uri += st + '/' + id + '/' + fd + '/' + ci + '/' + ri + '/' + searchType;
  }

  changeUrl(uri);
});

function changeUrl(uri) {
  window.history.pushState(history.go(0), 'HelpDesk', uri);
}
