@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Chamados</h2>
          </div>
          <div class="pull-right">
              <input type="text" class="form-controller" id="searchSolicitation" name="search"  autocomplete="off"></input>
              <a class="btn btn-success" href="{{ route('solicitations.create') }}">Novo</a>
              <div id="btn-group" class="btn-group" style="display:none;" data-toggle="buttons">
                <label class="btn btn-default active label label-info">
                  <input class="form-check-input" type="radio" name="display" checked autocomplete="off" value="name"> Nome/Razão
                </label>
                <label class="btn btn-default label label-info">
                  <input class="form-check-input" type="radio" name="display" autocomplete="off" value="fantasy_name"> Nome Fantasia
                </label>
              </div>
          </div>
      </div>
  </div>
  @if ($message = Session::get('success'))
  	<div class="alert alert-success">
  		<p>{{ $message }}</p>
  	</div>
  @endif
  <table class="table">
    <tr>
      <th>Código</th>
      <th>Cliente</th>
      <th>Prioridade</th>
      <th>Data/Hora</th>
      <th>Técnico</th>
      <th width="150px">Opções</th>
    </tr>
      @foreach ($data as $key => $solicitation)
        <tr @if ($solicitation->priority == "Alta" || Carbon\Carbon::now()->diffInSeconds($solicitation->created_at) > 172800)
              style='background-color: #ff7b5a'   
            @endif >
          <td>{{ Carbon\Carbon::now()->diffInSeconds($solicitation->created_at) }}</td>
          <td>{{ $solicitation->client->name }}</td>
          <td>{{ $solicitation->priority }}</td>
          <td>{{ $solicitation->created_at->format('d/m/Y H:i') }}</td>
          @if(@$solicitation->responsible->name)
          <td>{{@$solicitation->responsible->name}}</td>
          @else
          <td>Nenhum</td>
          @endif
          <td>
            <a class="btn btn-primary btn-sm" href="{{ route('solicitations.edit',$solicitation->id) }}">Editar</a>
          </td>
        </tr>
      @endforeach
  </table>
  {!! $data->render() !!}
</div>
@endsection
