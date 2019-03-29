@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRM</h2>
            </div>
            <div class="pull-right">
                <input type="text" class="form-controller" id="searchCRM" name="search" placeholder="Pesquisa..." autocomplete="off"></input>
                <a class="btn btn-success" href="{{ route('crm.create') }}">Novo</a>
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
        <th>Cliente</th>
        <th>Indicador</th>
        <th>Vendedor</th>
        <th>Status</th>
        <th width="150px">Opções</th>
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
            <td>{{ @$crm->status }}</td>
            <td>
              <a class="btn btn-primary btn-sm" href="{{ route('crm.edit',$crm->id) }}">Editar</a>
            </td>
          </tr>
        @endforeach
  </table>
  {!! $data->render() !!}
</div>
@endsection
