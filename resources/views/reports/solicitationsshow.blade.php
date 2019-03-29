@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h3>Visualizar chamado</h3>
          </div>
      </div>
  </div>

  <div class="row">
    <table class="table">
      <tr>
        <th>Código</th>
        <th>Cliente</th>
        <th>Data/Hora da abertura</th>
        <th>Data/Hora do fechamento</th>
        <th>Técnico</th>
      </tr>
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
      </tr>
    </table>
  </div>

  <div class="row">
    @foreach ($solicitation->actions as $action)
    <table class="table table-bordered">
    <th colspan="5">Ação: 00{{ $action->id }}</th>
    <tr>
      <td><strong>Forma de Atendimento: </strong>{{ $action->service_mode }}</td>
      <td><strong>Status: </strong>{{ $action->status }}</td>
      <td><strong>Responsável: </strong>{{ $action->responsible->name }}</td>
      <td><strong>Data/Hora: </strong>{{ $action->created_at->format('d/m/Y H:i') }}</td>
    </tr>
    <tr>
      <td id="accordion" colspan="4">
        <strong>Descrição:</strong>
        @if((strlen($action->description) > 60) and ($action->solicitationsFiles->count() >= 1))
          <a id="cc" href="#c{{ $action->id }}" data-toggle="collapse" data-target="#c{{ $action->id }}"
          class="collapsed glyphicon glyphicon-plus" style="float:right; text-decoration:none;"></a>

          <p id="cc">{{ substr($action->description, 0, 60)  }}...</p> <br>

          <ul class="collapse" id="c{{ $action->id }}" hidden>
          <li style="list-style:none;">{{ $action->description }}</li>
          @foreach ($action->solicitationsFiles as $file)
            <li id="{{ $file->id }}" style="list-style:none;"><a target="_blank" href="{{ asset('storage/'.$file->filename) }}">{{ $file->filename }}</a></li>

          @endforeach
        @elseif((strlen($action->description) < 60)  and ($action->solicitationsFiles->count() >= 1))
          <a id="cc" href="#c{{ $action->id }}" data-toggle="collapse" data-target="#c{{ $action->id }}"
          class="collapsed glyphicon glyphicon-plus" style="float:right; text-decoration:none;"></a>

          <p id="cc">{{$action->description}}</p> <br>

          <ul class="collapse" id="c{{ $action->id }}" hidden>
            <li style="list-style:none;">{{ $action->description }}</li>
            @foreach ($action->solicitationsFiles as $file)
              <li id="{{ $file->id }}" style="list-style:none;"><a target="_blank" href="{{ asset('storage/'.$file->filename) }}">{{ $file->filename }}</a></li>

            @endforeach
        @else
          <p id="cc">{{$action->description}}</p> <br>
        @endif
        </ul>
      </td>
    </tr>
    </table>
    @endforeach
  </div>
</div>

@endsection
