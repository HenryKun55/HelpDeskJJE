@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Usuários</h2>
			</div>
			<div class="pull-right">
				<input type="text" class="form-controller" id="searchUser" name="search" placeholder="Pesquisa..." autocomplete="off"></input>
				<a class="btn btn-success" href="{{ route('users.create') }}">Novo</a>
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
		<th>Nome</th>
		<th>Email</th>
		<th>Ramal</th>
		<th>Setor</th>
		<th width="150px">Opções</th>
	</tr>
	@foreach ($data as $key => $user)
		<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ @$user->branchLine->number }}</td>
			<td>{{ @$user->department->name }}</td>
			<td>
				<a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Editar</a>
			</td>
		</tr>
	@endforeach
</table>
{!! $data->render() !!}
</div>
@endsection
