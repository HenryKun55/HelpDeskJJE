<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Agendamento</title>
  <meta name="viewport" content="width=device-width, initial-scale=0.7"/>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');
    *{
      font-size: 14pt;
    }
    html{
        font-family: 'Roboto', sans-serif;
    }

    img{
        height: 150px;
        width: 400px;
    }

    a{
      color:white;
    }

    table td#header{
        background-color:#CC3333;
        color: white;
    }

    table td#headerRelatorio{
        background-color:#CC3333;
        color: white;
        border-top: 3px solid white;
    }

    table tr#headerRelatorio{
        background-color:#CC3333;
        color: white;
        border-top: 3px solid white;
    }

    table#tabDados tr{
        border-spacing: 0;
        border-color: white;
        margin: 0;
    }

    table{
        border-collapse: collapse;
    }

    table tr td{
        border: 2px solid black;
        border-color: #CC3333;
        border-spacing: 0;
        padding: 10px;
        margin: 0;
    }

    table tr td#space{
        border: 2px solid black;
        border-color: #CC3333;
        border-spacing: 0;
        padding: 2px;
        margin: 0;
    }
  </style>
</head>
<body>
  <center><header>
    <img src="http://helpdesk.jesistemas.com.br/img/JJENOVALOGO.jpg">
  </header></center>

<table align="center" id="tabDadosAbertura" width="70%">
  <tr>
    <td align="center">
     Agendamento do CRM
    </td>
  </tr>

  <tr>
    <td id="header">
          <!-- TABELA DOS DADOS DA ABERTURA DO CHAMADO -->
      <table id="tabDadosAbertura">
        <tr>
          <tr>
            <tr>
              <center><h5 style:"color:white;">Prezado(a): {{$crmaction->responsible->name}} <br> Foi agendado um contato com o {{$crm->client}} na Data - Hora:  {{$crmaction->contact_date}} - {{$crmaction->contact_hour}}</h5></center>
            </tr>
          </tr>
        </tr>
      </table>
            <!-- ////////////////////////// -->
    </td>
  </tr>

  <tr>
    <td id="space" align="center">
    </td>
  </tr>

  <tr>
    <td id="header">
      <!-- INFORMAÇÕES ADICIONAIS SOBRE O CHAMADO -->
      <table id="tabDadosAbertura" align="center">
      <tr>
        <tr>
          <tr>
              <center><h5>Atenciosamente, <br><a>comercial@jesistemas.com.br</a> <br>Telefone (81)3719-3557</h5></center>
          </tr>
        </tr>
      </tr>
      </table>
      <!-- ////////////////////////// -->
    </td>
  </tr>
 </table>
</body>
</html>
