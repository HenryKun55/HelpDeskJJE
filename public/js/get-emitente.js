function getEmit() {
  var cnpj = $('#cnpj').val().replace(/\D/g, '');
  $.ajax({
    dataType: 'jsonp',
    url: 'https://receitaws.com.br/v1/cnpj/' + cnpj,
    success: function (data) {
      $('#name').val(data.nome);
      $('#email').val(data.email);
      $('#fantasy-name').val(data.fantasia);
      $('#phone').val(data.telefone);
      $('#zip-code').val(data.cep);
      $('#street').val(data.logradouro);
      $('#number').val(data.numero);
      $('#complement').val(data.complemento);
      $('#district').val(data.bairro);
      $('#city').val(data.municipio);
      $('#uf').val(data.uf);
      var cep = $('#zip-code').val().replace(/\D/g, '');
      $.ajax({
          dataType: "json",
          url: "https://viacep.com.br/ws/"+ cep +"/json/?callback=?",
          success: function (dt) {
            $('#cod-mun').val(dt.ibge);
            $.getJSON( "/json/uf.json", function( uf ) {
              $.each( uf, function( key, val ) {
                if(uf[key].sigla === dt.uf) {
                  $('#cod-uf').val(uf[key].id);
                }
              });
            });
          }
      });
    }
  });
}
