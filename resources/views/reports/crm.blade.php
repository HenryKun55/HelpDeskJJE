@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Relatórios de CRM</h2>
          </div>
          <div class="form-group pull-right">
            <label for="filter">Status:</label>
            <select class="form-control" id="status-field">

              <?php
                $options = array('todos' => 'Todos', 'vendidos' => 'Vendidos', 'nao-vendidos' => 'Não Vendidos', 'negociando' => 'Negociando');

                foreach ($options as $key => $value) {
                  if ($key == $st) {
                    $options[$key] = "<option selected value=". $key .">$options[$key]</option>";
                  }else {
                    $options[$key] = "<option value=". $key .">$options[$key]</option>";
                  }
                }

                foreach ($options as $key => $value) {
                  echo $options[$key];
                }
              ?>
            </select>
          </div>
      </div>
  </div>
  <div class="row" id="cont">
    <table class="table">
      <tr>
        <th>Cliente</th>
        <th>Indicador</th>
        <th>Vendedor</th>
        <th>Data de abertura</th>
        <th>Status</th>
        <th width="180px">Opções</th>
      </tr>
      @foreach ($data as $key => $crm)
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
        <td>
          <a class="btn btn-primary btn-sm" href="{{ route('reports.crm.show',$crm->id) }}">Visualizar</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="row center" style="text-align: center">
    <a class="btn btn-primary btn-md" target="_blank" href="{{ route('reports.crm.export', [$st]) }}">Exportar</a>
    <br>
    <br>
    <br>
  </div>
</div>

@endsection
