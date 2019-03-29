<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Chamado</title>
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
                <h2>Chamado</h2>
              </td>
            </tr>
            <tr>
              <td style="padding: 5px 0 10px 0;" align="center">
                <h3>Status do chamado</h3>
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
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Data - hora:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->created_at->format('d/m/Y H:i') }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Nº chamado:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{$solicitation->protocol_number}}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Cliente:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->client->name }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Solicitante:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                              {{ $solicitation->client->responsible }}
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
        <td bgcolor="#ffffff" style="padding: 20px 15px 20px 15px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td style="padding: 5px 0 10px 0;" align="center">
                <h3>Dados do chamado</h3>
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
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Operador:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->responsible_department->name }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Assunto:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->subject }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Solicitação:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->solicitation_type }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Prioridade:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->priority }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Tipo de ocorrência:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->occurrence_type }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Categoria:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->category }}
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
        <td bgcolor="#ffffff" style="padding: 20px 15px 20px 15px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td style="padding: 5px 0 10px 0;" align="center">
                <h3>Última ação</h3>
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
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Data - Hora:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->actions->last()->created_at->format('d/m/Y H:i') }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Operador:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->actions->last()->responsible->name }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Status:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->actions->last()->status }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Operador/Grupo:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->actions->last()->responsible->department->name }}
                          </td>
                        </tr>
                        <tr>
                          <td align="right" style="padding: 25px 0 0 0;" width="50%">
                            <strong>Forma de atendimento:&#160;&#160;&#160;</strong>
                          </td>
                          <td align="left" style="padding: 25px 0 0 0;" width="50%">
                            {{ $solicitation->actions->last()->service_mode }}
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
        <td bgcolor="#ffffff" style="padding: 20px 15px 20px 15px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td align="center">
                <h3>Descrição da ação</h3>
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
                            {{ $solicitation->actions->last()->description }}
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
                      <center>Atenciosamente,
                        <br>{{$solicitation->responsible_department->name}}
                        <br><a>suporte@jjeautomacao.com.br</a>
                        <br>Telefone (81)3719-3557
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