@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Visualizar CRM</h2>
          </div>
      </div>
  </div>
  <div class="row">
    <table class="table">
      <tr>
        <th>Cliente</th>
        <th>Indicador</th>
        <th>Vendedor</th>
        <th>Data de abertura</th>
        <th>Status</th>
      </tr>
      <tr>
        <td>{{ @$crm->client }}</td>
        @if(@$crm->indicator)
            <td>{{@$crm->indicator}}</td>
        @else
            <td>Nenhum</td>
        @endif
        <td>{{ @$crm->seller->name }}</td>
        <td>{{ $crm->created_at }}</td>
        <td>{{ @$crm->status }}</td>
      </tr>
    </table>
  </div>
  <div class="row">
    @foreach($crm->crmActions as $action)
    <div>
      <table class="table table-bordered">
        <th colspan="5">Ação: 00{{ $action->id }}</th>
          <tr>
            <td><strong>Data: </strong>{{ $action->date }}</td>
            <td><strong>Hora: </strong>{{ $action->hour }}</td>
            <td><strong>Responsável: </strong>{{ $action->responsible->name }}</td>
          </tr>
          <tr>
            <td id="accordion" colspan="4">
              <strong>Descrição:</strong>
              @if(strlen($action->description) > 60)
              <a id="cc" href="#c{{ $action->id }}" data-toggle="collapse" data-target="#c{{ $action->id }}"
              class="collapsed glyphicon glyphicon-plus" style="float:right; text-decoration:none;"></a>
                <p id="cc">{{ substr($action->description, 0, 60)  }}...</p> <br>
                  <ul class="collapse" id="c{{ $action->id }}" hidden>
                    <li style="list-style:none;">{{ $action->description }}</li>
                  </ul>
              @else
                {{$action->description}}<br>
              @endif
            </td>
          </tr>
        </th>
      </table>
    </div>
    @endforeach
  </div>
</div>

@endsection
