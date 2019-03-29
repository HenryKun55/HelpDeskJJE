@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Base de Conhecimento</h2>
          </div>
          <div class="pull-right">
              <input type="text" class="form-controller" id="searchKnowLedgeBase" name="search" placeholder="Pesquisa..." autocomplete="off"></input>
              <a class="btn btn-success" href="{{ route('knowledge-bases.create') }}">Novo</a>
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
      <th width="200px">Assunto</th>
      <th width="200px">Produto Relacionado</th>
      <th>Descrição</th>
      <th width="180px">Opções</th>
    </tr>
  @foreach ($data as $key => $kb)
    <tr>
      <td>{{ $kb->subject }}</td>
      <td>{{ $kb->related_product }}</td>
      <td>{{ substr($kb->description, 0, 60) }}...</td>
      <td>
        <a class="btn btn-info btn-sm" href="{{ route('knowledge-bases.show',$kb->id) }}">Visualizar</a>
        <a class="btn btn-primary btn-sm" href="{{ route('knowledge-bases.edit',$kb->id) }}">Editar</a>
      </td>
    </tr>
  @endforeach
  </table>
  {!! $data->render() !!}

</div>
@endsection
