@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2 class="text-center">Dados do Emitente</h2>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-8 col-md-offset-2">
      <div>
        <br>
        <table class="table">
          <tr>
            <td><strong>Razão/Nome: </strong>{{ $emit->nome }}</td>
            <td><strong>Nome Fantasia: </strong>{{ $emit->nome_fantasia }}</td>
          </tr>
          <tr>
            <td><strong>CPF/CNPJ: </strong>{{ $emit->cpf_cnpj }}</td>
            <td><strong>Município: </strong>{{ $emit->municipio }}</td>
          </tr>
          <tr>
            <td><strong>Seriais: </strong></td>
          </tr>
        </table>
        <ul class="list-group">
            @foreach ($emit->serials as $key => $serial)
                  @if($serial->ativo == 0)
                    <li class="list-group-item" style="background-color: #ff7b5a">{{ $serial->numero }}<a class="ativo pull-right" href="{{ route('altera.status', $serial->id) }}"> ativar</a></li>
                  @else
                    <li class="list-group-item" style="background-color: #b7d5ac">
                      {{ $serial->numero ." - "}}
                      <span class="num-hd" id="{{ 'span'.$serial->num_serie_hd }}">
                        <span>{{ $serial->num_serie_hd }}</span>
                        <input type="text" class="serialin" id="{{$serial->num_serie_id}}}" value="{{$serial->num_serie_hd}}" style="display:none">
                        {!! Form::open(array('route' => 'altera.hd','method'=>'POST', 'id' => 'form'.$serial->num_serie_hd, 'style' => 'display:none')) !!}
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="serial_id" value="{{ $serial->id }}">
                          <input type="text" name="serial_num" id="{{ 'serial'.$serial->num_serie_hd }}">
                        {!! Form::close() !!}
                      </span>
                      <a class="ativo pull-right" href="{{ route('altera.status' , $serial->id) }}">
                        desativar
                      </a>
                    </li>
                  @endif
            @endforeach
        </ul>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <a class="btn btn-primary" href="{{ route('emitentes.index') }}">Voltar</a><br><br><br>
        </div>

      </div>
  </div>

</div>
</div>
<script>
var oldSerial;
$(document).on('click', '.num-hd', function () {
    t = $.trim($(this).text());
    $("span#span"+t).find("input").css("display", "inline");
    $("span#span"+t).find("span").css("display", "none");
    oldSerial = t;
});

$(".serialin").on('keypress', function(e) {
  $("#serial"+oldSerial).val(this.value);
  if(e.which == 13) { 
    $("#form"+oldSerial).submit();
  }
})
</script>
@endsection
