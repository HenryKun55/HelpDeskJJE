@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Editar Categoria</h2>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ops!</strong> Verifique os dados inseridos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($status, ['method' => 'PATCH','route' => ['statuses.update', $status->id]]) !!}
    {{ csrf_field() }}
        <div class="row">
          <hr>
            <div class="col-md-4 col-md-offset-4">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong class="required">Nome:</strong>
                      {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control', 'required')) !!}
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <br>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <a class="btn btn-primary" href="{{ route('statuses.index') }}">Voltar</a>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection
