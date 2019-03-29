@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Status</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('statuses.create') }}">Novo</a>
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
		<th>Nome do Status</th>
		<th width="150px">Opções</th>
	</tr>
	@foreach ($data as $key => $status)
		<tr>
			<td>{{ $status->name }}</td>
			<td>
				<a class="btn btn-primary btn-sm" href="{{ route('statuses.edit',$status->id) }}">Editar</a>
			</td>
		</tr>
	@endforeach
</table>
{!! $data->render() !!}
</div>
@endsection
