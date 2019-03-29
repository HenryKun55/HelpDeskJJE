@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tipos de Ocorrência</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('occurrence-types.create') }}">Novo</a>
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
		<th width="150px">Opções</th>
	</tr>
	@foreach ($data as $key => $ct)
		<tr>
			<td>{{ $ct->name }}</td>
			<td>
				<a class="btn btn-primary btn-sm" href="{{ route('occurrence-types.edit',$ct->id) }}">Editar</a>
			</td>
		</tr>
	@endforeach
</table>
{!! $data->render() !!}
</div>
@endsection
