$(document).ready(function () {
  $('#cpfcnpj').blur(function() {

    var cnpj = $('#cpfcnpj').val().replace(/\D/g, '');

    $.ajax({
        type: 'GET',
        url: 'https://receitaws.com.br/v1/cnpj/' + cnpj,
        dataType: 'jsonp',
        success: function (data) {
          $('#name').val(data.nome);
          $('#email').val(data.email);
          $('#fantasy-name').val(data.fantasia);
          $('#phone').val(data.telefone);
          $('#zip-code').val(data.cep);
          $('#street').val(data.logradouro);
          $('#number').val(data.numero);
          $('#district').val(data.bairro);
          $('#city').val(data.municipio);
          $('#uf').val(data.uf);
        },
        error: function (data) {console.log(data)}
    });
  })
});
