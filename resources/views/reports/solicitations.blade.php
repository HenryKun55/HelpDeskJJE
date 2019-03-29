@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h3>Relatórios de chamados</h3>
          </div>
      </div>
  </div>
  <div class="row">

    <div class="col-lg-2">
      <div class="form-group">
        <label for="solicitation-status">Status:</label>
        <select class="form-control" id="solicitation-status" name="solicitation-status">
          <?php
            $options = array('Todos', 'Abertos', 'Fechados');
            for ($i=0; $i < sizeof($options); $i++) {
              if ($options[$i] == $rs) {
                $options[$i] = '<option selected>'.$rs.'</option>';
              }else {
                $options[$i] = '<option>'.$options[$i].'</option>';
              }
            }

            for($i = 0; $i < sizeof($options); $i++){
              echo($options[$i]);
            }
          ?>
        </select>
      </div>
    </div>

    <div class="col-lg-2">
      <div class="form-group">
        <label for="initial-date">Data início:</label>
        <input id="initial-date" type="text" onfocus="(this.type='date')" name="initial-date" class="form-control" placeholder="Data início">
      </div>
    </div>

    <div class="col-lg-2">
      <div class="form-group">
        <label for="final-date">Data fim:</label>
        <input id="final-date" type="text" onfocus="(this.type='date')" name="final-date" class="form-control" placeholder="Data fim">
      </div>
    </div>

    <div class="col-lg-3">
      <div class="form-group">
        <label for="client-name">Cliente:</label>
        <input type="text" name="client-name" class="form-control ui-autocomplete-input" placeholder="Nome do cliente" autocomplete="off" id="q">
      </div>
    </div>

    <div class="col-lg-2">
      <div class="form-group">
            {!! Form::label('responsible', 'Técnico:') !!}
            {!! Form::select('responsible', $users, null, array('placeholder' => 'Todos', 'class' => 'form-control', 'id' => 'responsible')) !!}
      </div>
    </div>

    <input type="hidden" id="client-id" value="">

    <div class="1">
      <div class="form-group">
        <button type="button" class="btn btn-success btn-search" id="search-button">
          Buscar
        </button>
      </div>
    </div>
  </div>

  <div class="row" id="cont">
    <table class="table">
      <tr>
        <th>Código</th>
        <th>Cliente</th>
        <th>Data/Hora da abertura</th>
        <th>Data/Hora do fechamento</th>
        <th>Técnico</th>

        <th width="180px">Opções</th>
      </tr>
      @foreach ($data as $key => $solicitation)
        <tr>
          <td>{{ $solicitation->protocol_number }}</td>
          <td>{{ $solicitation->client->name }}</td>
          <td>{{ $solicitation->created_at->format('d/m/Y H:i') }}</td>
          <td>{{ $solicitation->closing_date }}</td>
          @if(@$solicitation->responsible->name)
          <td>{{@$solicitation->responsible->name}}</td>
          @else
          <td>Nenhum</td>
          @endif
          <td>
            <a class="btn btn-primary btn-sm" href="{{ route('reports.solicitations.show',$solicitation->id) }}">Visualizar</a>
          </td>
        </tr>
      @endforeach
    </table>
    {!! $data->render() !!}
  </div>
  <div class="center" style="text-align: center">
    <a class="btn btn-primary btn-md" target="_blank" href="{{ route('reports.solicitations.export', [$st, $id, $fd, $ci, $ri, $searchType]) }}">Exportar</a>
    <br>
    <br>
    <br>
  </div>
</div>

@endsection
