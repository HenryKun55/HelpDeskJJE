$(document).ready(function() {
    $('#zip-code').blur(function() {
        var cep = $('#zip-code').val().replace(/\D/g, '');
        var validadeCep = /^[0-9]{8}$/;

        if (validadeCep.test(cep)) {

            var url = "http://viacep.com.br/ws/" + cep + "/json?callback=?";

            $.getJSON(url, function(data) {

                if ("error" in data) {

                }

                for(i in data){
                    if(data.hasOwnProperty(i)){

                    }else{
                        swal({
                            title: "ATENÇÃO",
                            text: "Cep Inexistente",
                            icon: "warning ",
                            button: "Voltar",
                        });
                        break;
                    }
                }

                $('#street').val(data.logradouro);
                $('#complement').val(data.complemento);
                $('#district').val(data.bairro);
                $('#city').val(data.localidade);
                $('#uf').val(data.uf);
            })
        }else{
            swal({
                title: "ATENÇÃO",
                text: "Cep Incompleto ",
                icon: "info",
                button: "Voltar",
              });
        } 
    })
})