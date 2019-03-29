<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Help Desk JJE') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/amaran.min.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet"href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,"");
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
        v=v.replace(/(\d)(\d{4})$/,"$1-$2");
        return v;
    }
    function getByclass( el ){
        return document.getElementsByClassName( el );
    }
    window.onload = function(){
        var elems = document.getElementsByClassName( 'phone-mask' )
        for (var i = 0; i < elems.length; i++ ) {
            elems[i].onkeypress = function(){
                mascara( this, mtel );
            }
        }
    }
</script>

<script>
    $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "url": "json/Portuguese-Brasil.json"
                }
            }
        );
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#zip-code").mask("99.999-999");
});
</script>

<script>
$( function() {
  $( "#tabs" ).tabs();
} );
</script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Cadastro <span class="caret"></span>
                          </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/users">
                                        Usuários
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('clients.index') }}">
                                        Cliente
                                    </a>
                                </li>
                                <li class="dropdown-submenu">
                                  <a class="test" tabindex="-1" href="#">Chamados <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="{{ route('occurrence-types.index') }}">Tipo de Ocorrência</a></li>
                                    <li><a tabindex="-1" href="{{ route('categories.index') }}">Categoria</a></li>
                                    <li><a tabindex="-1" href="{{ route('statuses.index') }}">Status</a></li>
                                  </ul>
                                </li>
                            </ul>

                        </li>
                    @endif
                </ul>

                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Service Desk <span class="caret"></span>
                          </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('solicitations.index') }}">
                                        Chamados
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('knowledge-bases.index') }}">
                                        Base de Conhecimento
                                    </a>
                                </li>


                            </ul>

                        </li>
                    @endif
                </ul>
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                      <li><a href="{{ route('crm.index') }}">CRM</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                      <li><a href="{{ route('tasks.index') }}">Tarefas</a></li>
                    @endif
                </ul>

                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Relatórios <span class="caret"></span>
                          </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('reports.solicitations', ['st' => 'todos','id' => '00', 'fd' => '00', 'cn' => '00', 'ri' => '00', 'searchType' => '00' ]) }}">
                                        Chamados
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('reports.crm', ['todos']) }}">
                                        CRM
                                    </a>
                                </li>


                            </ul>

                        </li>
                    @endif
                </ul>

                <!-- <ul class="nav navbar-nav">
                    @if(Auth::check() and Auth::user()->department_id != 3)
                        <li><a href="/panel">Status dos Técnicos</a></li>
                    @endif
                </ul> -->


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                localStorage.clear();
                                                document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div id="snowflakeContainer">
    <p class="snowflake">*</p></div>
    @yield('content')
    
    <center><footer class="footer">
      <div>Copyright &copy; 2018 | Desenvolvido por JJE Automação Comercial. Todos os direitos reservados.</div>
    </footer></center>

</div>

<!-- Scripts -->
<script src="{{ asset('js/cpfcnpjmask.js') }}"></script>
<script src="{{ asset('js/cnpjmask.js') }}"></script>
<script src="{{ asset('js/myscript.js') }}"></script>
<script src="{{ asset('js/getresp.js') }}"></script>
<script src="{{ asset('js/changeGlyph.js') }}"></script>
<script src="{{ asset('js/buscaCep.js') }}"></script>
<script src="{{ asset('js/changeInputEnter.js') }}"></script>
<script src="{{ asset('js/searchFields.js') }}"></script>
<script src="{{ asset('js/ajaxSetup.js') }}"></script>
<script src="{{ asset('js/getcnpj.js') }}"></script>
<script src="{{ asset('js/get-emitente.js') }}"></script>
<script src="{{ asset('js/search-client-reports.js') }}"></script>
<script src="{{ asset('js/search-client-solicitations.js') }}"></script>
<script src="{{ asset('js/reports-solicitations.js') }}"></script>
<script src="{{ asset('js/reports-crm.js') }}"></script>
<script src="{{ asset('/js/jquery.amaran.js') }}"></script>   

<script>
  $(document).ready(function(){
    $('.dropdown-submenu a.test').on("click", function(e){
      $(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });
  });
</script>

<script type="text/javascript">
function schedule() {
  $(".datawrap").children().remove();
  if($('#status option:selected').val() == 'Negociando') {
    $(".datawrap").children().remove();
    $('.datawrap').append('<div class="panel panel-default"><div class="panel-heading" style="background-color: #d4d4d4"><strong>Data do Próximo Contato:</strong></div><div class="panel-body"><div class="form-group col-md-6"><label for="contact_date" class="required">Data:</label><input rows="2" class="form-control changeInputEnter" name="contact_date" id="date" type="date"></div><div class="form-group col-md-6"><label for="contact_hour" class="required">Hora:</label><input class="form-control changeInputEnter" required="" name="contact_hour" id="hour" type="time"></div></div></div>');
  }
}
</script>
</body>
</html>
