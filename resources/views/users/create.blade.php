@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Novo Usuário</h2>
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
    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    {{ csrf_field() }}
    <div class="row">
      <hr>
      <div class="col-md-8 col-md-offset-2">
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                  <strong class="required">Nome:</strong>
                  {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control changeInputEnter', 'required', 'maxlength' => '50')) !!}
              </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                  <strong class="required">Email:</strong>
                  {!! Form::text('email', null, array('placeholder' => 'email@exemplo.com','class' => 'form-control changeInputEnter', 'required', 'maxlength' => '50')) !!}
              </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                  <strong>Ramal:</strong>
                  {!! Form::select('branch-line',$branchLines, [], array('class' => 'form-control changeInputEnter')) !!}
              </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                  <strong class="required">Setor:</strong>
                  {!! Form::select('department', $departments, [], array('placeholder' => 'Selecione','class' => 'form-control changeInputEnter', 'required')) !!}
              </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                  <strong class="required">Senha:</strong>
                  {!! Form::password('password', array('placeholder' => 'Senha','class' => 'form-control changeInputEnter', 'required', 'maxlength' => '16')) !!}
              </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                  <strong class="required">Confirmar Senha:</strong>
                  {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Senha','class' => 'form-control changeInputEnter', 'required' , 'maxlength' => '16')) !!}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <br>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="btn btn-primary" href="{{ route('users.index') }}">Voltar</a>
          </div>
        </div>
      </div>
    {!! Form::close() !!}
</div>
@endsection
