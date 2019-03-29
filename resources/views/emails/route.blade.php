<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Pesquisa de Satisfação</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0; font-size: 14px;">
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
      <tr>
        <td align="left" bgcolor="" style="padding: 40px 0 30px 0;">
          <img src="http://helpdesk.jesistemas.com.br/img/logo-jje-3.jpeg" alt="JJE Automação Comercial" width="270" height="115" style="display: block;" />
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffff" style="padding: 20px 15px 20px 15px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td align="center">
                <h3>Pesquisa de Satisfação</h3>
                <hr size="1">
              </td>
            </tr>
            <tr>
              <td>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="260" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                          <td style="padding: 25px 0 0 0;">
                            Olá {{ $solicitation->client->name }},

                            Com o objetivo de aprimorar nossos serviços e aumentar a qualidade do nosso atendimento,
                            pedimos que por gentileza responda nossa pesquisa de satisfação
                            sobre o atendimento do chamado nº: {{$solicitation->protocol_number}}
                            finalizado no dia {{ $solicitation->created_at->format('d/m/Y') }} às {{ $solicitation->created_at->format('H:i') }}.

                            Para responder a pesquisa clique no link abaixo: <br><br>

                            <a href="{{route ('pesquisa.satisfacao')}}">Responder Relatório</a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="" style="padding: 30px 30px 30px 30px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td align="center">
                <table border="0" cellpadding="0" cellspacing="0">
                  <tr>
                  <td width="75%">
                      <center>
                        Agradecemos antecipadamente pelo seu tempo e consideração,<br><br>
                        Atenciosamente,<br><a>suporte@jjeautomacao.com.br</a><br>
                        Telefone (81)3719-3557
                      </center>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
   </td>
  </tr>
 </table>
</body>
</html>