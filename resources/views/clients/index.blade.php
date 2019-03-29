@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Clientes</h2>
        </div>
        	<div class="pull-right">
				<input type="text" class="form-controller" id="searchClient" name="search" placeholder="Pesquisa..." autocomplete="off"></input>
				<a class="btn btn-success" href="{{ route('clients.create') }}">Novo</a>
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
		<th>Razão/Nome</th>
		<th>CPF/CNPJ</th>
		<th>E-mail</th>
		<th>Cidade</th>
		<th width="180px">Opções</th>
	</tr>
	@foreach ($data as $key => $client)
		<tr>
			<td>{{ $client->name }}</td>
			<td>{{ $client->cpf_cnpj }}</td>
			<td>{{ $client->email }}</td>
			<td>{{ $client->city }}</td>
			<td>
        		<a class="btn btn-info btn-sm" href="{{ route('clients.show',$client->id) }}">Visualizar</a>
				<a class="btn btn-primary btn-sm" href="{{ route('clients.edit',$client->id) }}">Editar</a>
			</td>
		</tr>
	@endforeach
</table>
{!! $data->render() !!}
</div>
@endsection
