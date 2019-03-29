function send() {
  $('label').on('click', function(){
    var $this = $(this);
    var idUser = $this.children('.user').val();
    var status = null;
    var status = ($this.children('.status:checked').val() == 1 ) ? 1 : 0;
    $.post( "http://helpdesk.jesistemas.com.br/panel/status", {status: status, userid: idUser, "_token": $('.token').val()});
    if ($this.children('.adm').val() == 1) {
      $(this).children('.status:checked').attr("disabled", true);
      document.getElementById(idUser).innerHTML = "Indisponível";
    }
    else if (document.getElementById(idUser).innerHTML == "Indisponível") {
      document.getElementById(idUser).innerHTML = "Disponível";
    } else {
      document.getElementById(idUser).innerHTML = "Indisponível";
    }

  });
}
