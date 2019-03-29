@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tarefas</h2>
            </div>
            <div class="pull-right">
                <input type="text" class="form-controller" id="searchTasks" name="search" placeholder="Pesquisa..." autocomplete="off"></input>
                <a class="btn btn-success" href="{{ route('tasks.create') }}">Novo</a>
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
        <th>Descrição</th>
        <th>Comentário</th>
        <th>Prioridade</th>
        <th>Status</th>
        <th width="150px">Opções</th>
    </tr>
        @foreach ($data as $key => $task)
          <tr>
            <td>{{ $task->description }}</td>
            <td>{{ substr($task->comment, 0, 40) }}...</td>
            <td>{{ $task->priority }}</td>
            <td>{{ $task->status }}</td>
            <td>
              <a class="btn btn-primary btn-sm" href="{{ route('tasks.edit',$task->id) }}">Editar</a>
            </td>
          </tr>
        @endforeach
  </table>
  {!! $data->render() !!}
</div>
@endsection
