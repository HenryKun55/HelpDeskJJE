  <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=0.6">
        
        <title>Pesquisa de Satisfação - JJE</title>  

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script type="text/javascript">

        $(function() {
            $("input[name='selector1']").click(function(){
                console.log($(this).val());
                if($(this).val() == "PÉSSIMO"){
                    $("#pergunta1").show('normal');
                }else{
                    $("#pergunta1").hide('normal');
                }
            });

            $("input[name='selector2']").click(function(){
                console.log($(this).val());
                if($(this).val() == "PÉSSIMO"){
                    $("#pergunta2").show('normal');
                }else{
                    $("#pergunta2").hide('normal');
                }
            });

             $("input[name='selector3']").click(function(){
                console.log($(this).val());
                if($(this).val() == "PÉSSIMO"){
                    $("#pergunta3").show('normal');
                }else{
                    $("#pergunta3").hide('normal');
                }
            });

            $("input[name='selector5']").click(function(){
                console.log($(this).val());
                if($(this).val() == "PÉSSIMO"){
                    $("#pergunta5").show('normal');
                }else{
                    $("#pergunta5").hide('normal');
                }
            });

            $("input[name='selector8']").click(function(){
                console.log($(this).val());
                if($(this).val() == "PÉSSIMO"){
                    $("#pergunta8").show('normal');
                }else{
                    $("#pergunta8").hide('normal');
                }
            });
        });
        
            function valida(){
                var i;
                for (i = 1; i < 9; i++) {  

                    if (form.selector1.value != "")
                    {
                        if(form.resposta1.value == "" && form.selector1.value == "PÉSSIMO"){
                            location.href = '#e1-option';
                            swal("Falta responder a justificativa da pergunta 1!");
                            return false;
                            break;
                        }
                    }else{
                        location.href = '#p1';
                        swal("Falta pergunta 1!");
                        return false;
                        break;
                    }
                    
                    if (form.selector2.value != "")
                    {
                        if(form.resposta2.value == "" && form.selector2.value == "PÉSSIMO"){
                            location.href = '#e2-option';
                            swal("Falta responder a justificativa da pergunta 2!");
                            return false;
                            break;
                        }
                    }else{
                        location.href = '#p2';
                        swal("Falta pergunta 2!");
                        return false;
                        break;
                    }

                    if (form.selector3.value != "")
                    {
                        if(form.resposta3.value == "" && form.selector3.value == "PÉSSIMO"){
                            location.href = '#e3-option';
                            swal("Falta responder a justificativa da pergunta 3!");
                            return false;
                            break;
                        }
                    }else{
                        location.href = '#p3';
                        swal("Falta pergunta 3!");
                        return false;
                        break;
                    }

                    if (form.selector4.value == "")
                    {
                        location.href = '#p4';
                        swal("Falta pergunta 4!");
                        return false;
                        break;
                    }

                    if (form.selector5.value != "")
                    {
                        if(form.resposta5.value == "" && form.selector5.value == "PÉSSIMO"){
                            location.href = '#e5-option';
                            swal("Falta responder a justificativa da pergunta 5!");
                            return false;
                            break;
                        }
                    }else{
                        location.href = '#p5';
                        swal("Falta pergunta 5!");
                        return false;
                        break;
                    }

                    if (form.selector6.value == "")
                    {
                        location.href = '#p6';
                        swal("Falta pergunta 6!");
                        return false;
                        break;
                    }
                    if (form.selector7.value == "")
                    {
                        location.href = '#p7';
                        swal("Falta pergunta 7!");
                        return false;
                        break;
                    }

                    if (form.selector8.value != "")
                    {
                        if(form.resposta8.value == "" && form.selector8.value == "PÉSSIMO"){
                            location.href = '#e8-option';
                            swal("Falta responder a justificativa da pergunta 8!");
                            return false;
                            break;
                        }
                    }else{
                        location.href = '#p8';
                        swal("Falta pergunta 8!");
                        return false;
                        break;
                    }
                }    
            }
        </script>
        <style>
            html{
  background-color: white;
}

.container{
  display: block;
  position: relative;
  margin: 40px auto;
  margin-top: 0px;
  height: auto;
  width: 500px;
  padding: 20px;
  background-color: white;
}

header{
  margin: -8px;
  margin-bottom: 0px; 

  background-color: white;
}

img{
  height: 150px;
  width: 400px;
}

h2 {
	color: #000000;
}

label#falta{
  color: #CC3333;
}

.container ul{
  list-style: none;
  margin: 0;
  padding: 0;
	overflow: auto;
}

ul li#botao label{
  color: white;
  position: absolute;
  padding:10px 20px 10px;
  right:0px;
  border-bottom: none;
  background-color: deepskyblue;
}

ul li#botao{
  border: none;

}

ul li{
	color: #000000;
  display: block;
  position: relative;
  float: left;
  width: 100%;
  height: 100px;
	border-bottom: 1px solid #333;
}

ul li input[type=radio]{
  position: absolute;
  visibility: hidden;
}

div#pergunta1{
  display: none;
  position: static;
}

div#pergunta2{
  display: none;
}

div#pergunta3{
  display: none;
}

div#pergunta5{
  display: none;
}

div#pergunta8{
  display: none;
}

input[type=text]{
  position: relative;
  width: 495px;
}

ul li label{
  display: block;
  position: relative;
  font-weight: 300;
  font-size: 20pt;
  padding: 25px 25px 25px 80px;
  margin: 10px auto;
  height: 30px;
  z-index: 9;
  cursor: pointer;
  -webkit-transition: all 0.25s linear;
}

ul li#botao:hover label{
  color: white;
  background: #00abee;
}

ul li:hover label{
	color: #000000;
}

ul li .check{
  display: block;
  position: absolute;
  border: 5px solid   ;
  border-radius: 100%;
  height: 25px;
  width: 25px;
  top: 30px;
  left: 20px;
	z-index: 5;
	transition: border .25s linear;
	-webkit-transition: border .25s linear;
}

ul li:hover .check {
  border: 5px solid #AAAAAA;
}

ul li .check::before {
  display: block;
  position: absolute;
	content: '';
  border-radius: 100%;
  height: 15px;
  width: 15px;
  top: 5px;
	left: 5px;
  margin: auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
}

input[type=radio]:checked ~ .check {
  border: 5px solid #CC3333;
}

input[type=radio]:checked ~ .check::before{
  background:#CC3333;
}

input[type=radio]:checked ~ label{
  color:#CC3333;
}


        </style>
    </head> 
    <body>   
        <center><header>
            <img src="http://helpdesk.jesistemas.com.br/img/JJENOVALOGO.jpg">
        </header></center>
        <div class="container">
            <form id="form" action="/relatorio" method="POST">
            {{ csrf_field() }}    

            <h2 id="p1">1 - [Presteza:] O analista se mostrou atencioso e prestativo para resolver sua solicitação?</h2>
                
            <ul>    
            <li>
                <input type="radio" id="a1-option" name="selector1" value="ÓTIMO"
                <?php if (isset($_POST['selector1']) && $_POST['selector1'] == 'ÓTIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="a1-option">ÓTIMO</label>
                
                <div class="check"></div>
            </li>
            
            <li>
                <input type="radio" id="b1-option" name="selector1" value="BOM"
                <?php if (isset($_POST['selector1']) && $_POST['selector1'] == 'BOM'): ?>checked='checked'<?php endif; ?>>
                <label for="b1-option">BOM</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>
            
            <li>
                <input type="radio" id="c1-option" name="selector1" value="REGULAR"
                <?php if (isset($_POST['selector1']) && $_POST['selector1'] == 'REGULAR'): ?>checked='checked'<?php endif; ?>>
                <label for="c1-option">REGULAR</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="d1-option" name="selector1" value="RUIM"
                <?php if (isset($_POST['selector1']) && $_POST['selector1'] == 'RUIM'): ?>checked='checked'<?php endif; ?>>
                <label for="d1-option">RUIM</label>
                
                <div class="check"></div>
                
            </li>

            <li>
                <input type="radio" id="e1-option" name="selector1" value="PÉSSIMO"
                <?php if (isset($_POST['selector1']) && $_POST['selector1'] == 'PÉSSIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="e1-option" >PÉSSIMO</label>
                <div class="check">
                </div>
            </li>
            <div id="pergunta1"> 
                <div style="opacity:0;">a</div>
                <h4>Por&nbsp;que?&nbsp;</h4>
                        <input name="resposta1" type="text">
                    </div>
            </ul>
        </div>
        

        <div class="container">

            <h2 id="p2">2 - [FeedBack:] O analista o manteve informado na resolução do chamado ?</h2>
                
            <ul>
            <li>
                <input type="radio" id="a2-option" name="selector2" value="ÓTIMO"
                <?php if (isset($_POST['selector2']) && $_POST['selector2'] == 'ÓTIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="a2-option">ÓTIMO</label>
                
                <div class="check"></div>
            </li>
            
            <li>
                <input type="radio" id="b2-option" name="selector2" value="BOM"
                <?php if (isset($_POST['selector2']) && $_POST['selector2'] == 'BOM'): ?>checked='checked'<?php endif; ?>>
                <label for="b2-option">BOM</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>
            
            <li>
                <input type="radio" id="c2-option" name="selector2" value="REGULAR"
                <?php if (isset($_POST['selector2']) && $_POST['selector2'] == 'REGULAR'): ?>checked='checked'<?php endif; ?>>
                <label for="c2-option">REGULAR</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="d2-option" name="selector2" value="RUIM"
                <?php if (isset($_POST['selector2']) && $_POST['selector2'] == 'RUIM'): ?>checked='checked'<?php endif; ?>>
                <label for="d2-option">RUIM</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="e2-option" name="selector2" value="PÉSSIMO"
                <?php if (isset($_POST['selector2']) && $_POST['selector2'] == 'PÉSSIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="e2-option">PÉSSIMO</label>
                <div class="check">

                </div>
            </li>
            <div id="pergunta2">
                <div style="opacity:0;">a</div>
                    <h4>Por&nbsp;que?&nbsp;</h4>
                        <input name="resposta2" type="text">
                    </div>
            </ul>
        </div>   

         <div class="container">

            <h2 id="p3">3 - [Qualidade de atendimento:] Como você avalia a qualidade do atendimento prestado neste chamado ?</h2>
                
            <ul>
            <li>
                <input type="radio" id="a3-option" name="selector3" value="ÓTIMO"
                <?php if (isset($_POST['selector3']) && $_POST['selector3'] == 'ÓTIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="a3-option">ÓTIMO</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="b3-option" name="selector3" value="BOM"
                <?php if (isset($_POST['selector3']) && $_POST['selector3'] == 'BOM'): ?>checked='checked'<?php endif; ?>>
                <label for="b3-option">BOM</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="c3-option" name="selector3" value="REGULAR"
                <?php if (isset($_POST['selector3']) && $_POST['selector3'] == 'REGULAR'): ?>checked='checked'<?php endif; ?>>
                <label for="c3-option">REGULAR</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="d3-option" name="selector3" value="RUIM"
                <?php if (isset($_POST['selector3']) && $_POST['selector3'] == 'RUIM'): ?>checked='checked'<?php endif; ?>>
                <label for="d3-option">RUIM</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="e3-option" name="selector3" value="PÉSSIMO"
                <?php if (isset($_POST['selector3']) && $_POST['selector3'] == 'PÉSSIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="e3-option">PÉSSIMO</label>
                <div class="check">

                </div>
            </li>
            <div id="pergunta3">
                <div style="opacity:0;">a</div>
                    <h4>Por&nbsp;que?&nbsp;</h4>
                        <input name="resposta3" type="text">
                    </div>
            </ul>
        </div>   

         <div class="container">

            <h2 id="p4">4 - [Contato:] Quantos contatos foram necessários para resolver o seu problema de forma satisfatória ?</h2>
            
            <ul>
            <li>
                <input type="radio" id="a4-option" name="selector4" value="2"
                <?php if (isset($_POST['selector4']) && $_POST['selector4'] == '2'): ?>checked='checked'<?php endif; ?>>
                <label for="a4-option">2</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="b4-option" name="selector4" value="3 ou mais"
                <?php if (isset($_POST['selector4']) && $_POST['selector4'] == '3 ou mais'): ?>checked='checked'<?php endif; ?>>
                <label for="b4-option">3 ou mais</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="c4-option" name="selector4" value="O meu problema ainda não está resolvido"
                <?php if (isset($_POST['selector4']) && $_POST['selector4'] == 'O meu problema ainda não está resolvido'): ?>checked='checked'<?php endif; ?>>
                <label for="c4-option">O meu problema ainda não está resolvido</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="d4-option" name="selector4" value="Apenas um contato"
                <?php if (isset($_POST['selector4']) && $_POST['selector4'] == 'Apenas um contato'): ?>checked='checked'<?php endif; ?>>
                <label for="d4-option">Apenas um contato</label>
                
                <div class="check"></div>
            </li>
            </ul>
        </div>

        <div class="container">

            <h2 id="p5">5 - [Conhecimento Técnico:] Em sua visão, como você avalia o conhecimento técnico demonstrado pelo analista ?</h2>

            <ul>
            <li>
                <input type="radio" id="a5-option" name="selector5" value="ÓTIMO"
                <?php if (isset($_POST['selector5']) && $_POST['selector5'] == 'ÓTIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="a5-option">ÓTIMO</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="b5-option" name="selector5" value="BOM"
                <?php if (isset($_POST['selector5']) && $_POST['selector5'] == 'BOM'): ?>checked='checked'<?php endif; ?>>
                <label for="b5-option">BOM</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="c5-option" name="selector5" value="REGULAR"
                <?php if (isset($_POST['selector5']) && $_POST['selector5'] == 'REGULAR'): ?>checked='checked'<?php endif; ?>>
                <label for="c5-option">REGULAR</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="d5-option" name="selector5" value="RUIM"
                <?php if (isset($_POST['selector5']) && $_POST['selector5'] == 'RUIM'): ?>checked='checked'<?php endif; ?>>
                <label for="d5-option">RUIM</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="e5-option" name="selector5" value="PÉSSIMO"
                <?php if (isset($_POST['selector5']) && $_POST['selector5'] == 'PÉSSIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="e5-option">PÉSSIMO</label>
                <div class="check">
                <br>
                <br>
                </div>
            </li>
            <div id="pergunta5">
                <div style="opacity:0;">a</div>
                    <h4>Por&nbsp;que?&nbsp;</h4>
                        <input name="resposta5" type="text">
                    </div>
            </ul>
        </div>

        <div class="container">

            <h2 id="p6">6 - [Forma de Atendimento:] Em sua opinião, qual melhor meio de comunicação para atendermos a sua solicitação de uma forma rápida e efeciente ?</h2>

            <ul>
            <li>
                <input type="radio" id="a6-option" name="selector6" value="CHAT"
                <?php if (isset($_POST['selector6']) && $_POST['selector6'] == 'CHAT'): ?>checked='checked'<?php endif; ?>>
                <label for="a6-option">CHAT</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="b6-option" name="selector6" value="E-MAIL"
                <?php if (isset($_POST['selector6']) && $_POST['selector6'] == 'E-MAIL'): ?>checked='checked'<?php endif; ?>>
                <label for="b6-option">E-MAIL</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="c6-option" name="selector6" value="PORTAL DO CLIENTE"
                <?php if (isset($_POST['selector6']) && $_POST['selector6'] == 'PORTAL DO CLIENTE'): ?>checked='checked'<?php endif; ?>>
                <label for="c6-option">PORTAL DO CLIENTE</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="d6-option" name="selector6" value="TELEFONE"
                <?php if (isset($_POST['selector6']) && $_POST['selector6'] == 'TELEFONE'): ?>checked='checked'<?php endif; ?>>
                <label for="d6-option">TELEFONE</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="e6-option" name="selector6" value="SMS"
                <?php if (isset($_POST['selector6']) && $_POST['selector6'] == 'SMS'): ?>checked='checked'<?php endif; ?>>
                <label for="e6-option">SMS</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="f6-option" name="selector6" value="PESSOALMENTE"
                <?php if (isset($_POST['selector6']) && $_POST['selector6'] == 'PESSOALMENTE'): ?>checked='checked'<?php endif; ?>>
                <label for="f6-option">PESSAOLMENTE</label>
                
                <div class="check"></div>
            </li>
            </ul>
        </div>

        <div class="container">

            <h2 id="p7">7 - [Em Geral:] Você recomendaria os serviços da JJE Automação a um amigo ou colega?</h2>

            <ul>
            <li>
                <input type="radio" id="a7-option" name="selector7" value="SIM, COM CERTEZA"
                <?php if (isset($_POST['selector7']) && $_POST['selector7'] == 'SIM, COM CERTEZA'): ?>checked='checked'<?php endif; ?>>
                <label for="a7-option">SIM, COM CERTEZA</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="b7-option" name="selector7" value="TALVEZ, AINDA NÃO CONHEÇO OPINIÃO FORMADA"
                <?php if (isset($_POST['selector7']) && $_POST['selector7'] == 'TALVEZ, AINDA NÃO CONHEÇO OPINIÃO FORMADA'): ?>checked='checked'<?php endif; ?>>
                <label for="b7-option">TALVEZ, AINDA NÃO CONHEÇO OPINIÃO FORMADA</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="c7-option" name="selector7" value="NÃO , O ATENDIMENTO FICOU AQUÉM DA EXPECTATIVA"
                <?php if (isset($_POST['selector7']) && $_POST['selector7'] == 'NÃO , O ATENDIMENTO FICOU AQUÉM DA EXPECTATIVA'): ?>checked='checked'<?php endif; ?>>
                <label for="c7-option">NÃO , O ATENDIMENTO FICOU AQUÉM DA EXPECTATIVA</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>
            </ul>
        </div>

        <div class="container">

            <h2 id="p8">8 - Como você avalia esse atendimento?</h2>

            <ul>
            <li>
                <input type="radio" id="a8-option" name="selector8" value="ÓTIMO"
                <?php if (isset($_POST['selector8']) && $_POST['selector8'] == 'ÓTIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="a8-option">ÓTIMO</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="b8-option" name="selector8" value="BOM"
                <?php if (isset($_POST['selector8']) && $_POST['selector8'] == 'BOM'): ?>checked='checked'<?php endif; ?>>
                <label for="b8-option">BOM</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="c8-option" name="selector8" value="REGULAR"
                <?php if (isset($_POST['selector8']) && $_POST['selector8'] == 'REGULAR'): ?>checked='checked'<?php endif; ?>>
                <label for="c8-option">REGULAR</label>
                
                <div class="check"><div class="inside"></div></div>
            </li>

            <li>
                <input type="radio" id="d8-option" name="selector8" value="RUIM"
                <?php if (isset($_POST['selector8']) && $_POST['selector8'] == 'RUIM'): ?>checked='checked'<?php endif; ?>>
                <label for="d8-option">RUIM</label>
                
                <div class="check"></div>
            </li>

            <li>
                <input type="radio" id="e8-option" name="selector8" value="PÉSSIMO"
                <?php if (isset($_POST['selector8']) && $_POST['selector8'] == 'PÉSSIMO'): ?>checked='checked'<?php endif; ?>>
                <label for="e8-option">PÉSSIMO</label>
                
                <div class="check">
                <br>
                <br>
                </div>
            </li>
            <div id="pergunta8">
                <div style="opacity:0;">a</div>
                    <h4>Por&nbsp;que?&nbsp;</h4>
                        <input name="resposta8" type="text">
                    </div>
            </ul>

                <div style="opacity:0;">a</div>
                <div style="opacity:0;">a</div>

            <center>
                <ul>
                <input type="hidden" name="solicitation_id" value="{{$solicitation->id}}">
                <li id="botao" onclick="return valida();">
                <input id="enviar" type="submit" name="botao" hidden>
                <label for="enviar">Enviar</label>
                </li>
                </ul>
            </center>
                
        </form>
    </body>
    
</html>
