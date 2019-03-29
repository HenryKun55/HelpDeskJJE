<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Pesquisa de Satisfação - Relatório</title>
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
                <h2>Pesquisa de Satisfação - Relatório</h2>
              </td>
            </tr>
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
              <td align="center">
                <h2>Relatório da pesquisa</h2>
              </td>
            </tr>
            <tr>
              <td align="center">
                <h3>1 - [Presteza:] O analista se mostrou atencioso e prestativo para resolver sua solicitação?</h3>
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
                            <h4><?php echo $_POST['selector1'];?></h4>
                            <?php if ($_POST['selector1'] == 'PÉSSIMO'): ?><h5>R:&nbsp;&nbsp;<?php echo $_POST['resposta1']; endif ?></h5><?php ;?>
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
                <h3>2 - [FeedBack:] O analista o manteve informado na resolução do chamado ?</h3>
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
                            <h4><?php echo $_POST['selector2'];?></h4>
                            <?php if ($_POST['selector2'] == 'PÉSSIMO'): ?><h5>R:&nbsp;&nbsp;<?php echo $_POST['resposta2']; endif ?></h5><?php ;?>
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
                <h3>3 - [Qualidade de atendimento:] Como você avalia a qualidade do atendimento prestado neste chamado ?</h3>
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
                            <h4><?php echo $_POST['selector3'];?></h4>
                            <?php if ($_POST['selector3'] == 'PÉSSIMO'): ?><h5>R:&nbsp;&nbsp;<?php echo $_POST['resposta3']; endif ?></h5><?php ;?>
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
                <h3>4 - [Contato:] Quantos contatos foram necessários para resolver o seu problema de forma satisfatória ?</h3>
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
                            <h4><?php echo $_POST['selector5'];?></h4>
                            <?php if ($_POST['selector5'] == 'PÉSSIMO'): ?><h5>R:&nbsp;&nbsp;<?php echo $_POST['resposta5']; endif ?></h5><?php ;?>
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
                <h3>5 - [Conhecimento Técnico:] Em sua visão, como você avalia o conhecimento técnico demonstrado pelo analista ?</h3>
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
                            <h4><?php echo $_POST['selector5'];?></h4>
                            <?php if ($_POST['selector5'] == 'PÉSSIMO'): ?><h5>R:&nbsp;&nbsp;<?php echo $_POST['resposta5']; endif ?></h5><?php ;?>
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
                <h3>6 - [Forma de Atendimento:] Em sua opinião, qual melhor meio de comunicação para atendermos a sua solicitação de uma forma rápida e efeciente ?</h3>
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
                            <h4><?php echo $_POST['selector6'];?></h4>
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
                <h3>7 - [Em Geral:] Você recomendaria os serviços da JJE Automação a um amigo ou colega?</h3>
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
                          <h4><?php echo $_POST['selector7'];?></h4>
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
                <h3>8 - Como você avalia esse atendimento?</h3>
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
                            <h4><?php echo $_POST['selector8'];?></h4>
                            <?php if ($_POST['selector8'] == 'PÉSSIMO'): ?><h5>R:&nbsp;&nbsp;<?php echo $_POST['resposta8']; endif ?></h5><?php ;?>
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
   </td>
  </tr>
 </table>
</body>
</html>