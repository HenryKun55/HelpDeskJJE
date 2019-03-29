@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
                <h4 class="text-center">Cadastro CRM</h4>
                <div class="panel-body" id="pbd">
                  <div id="tabs">
                    <ul>
                      <li><a href="#tabs-1">Cadastro</a></li>
                      <li><a href="#tabs-2" style="pointer-events:none;">Tarefas</a></li>
                      <li><a href="#tabs-3" style="pointer-events:none;">Histórico</a></li>
                    </ul>
                    <div id="tabs-1">

                      <div class="content-tab">
                        {!! Form::open(array('route' => 'crm.store','method'=>'POST')) !!}
                        {{ csrf_field() }}

                        <div class="form-group col-md-8">
                         {!! Form::label('client', 'Cliente:', array('class' => 'required')) !!}
                         {!! Form::text('client', null, array('class' => 'form-control changeInputEnter', 'required', 'placeholder' => 'Cliente', 'maxlength' => '50')) !!}
                        </div>

                        <div class="form-group col-md-4">
                         {!! Form::label('phone', 'Telefone:') !!}
                         {!! Form::text('phone', null, array('id' => 'phone', 'class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15', 'placeholder' => '(99)9999-9999')) !!}
                        </div>

                        <div class="form-group col-md-8">
                         {!! Form::label('email', 'Email:') !!}
                         {!! Form::text('email', null, array('class' => 'form-control changeInputEnter', 'placeholder' => 'email@exemplo.com', 'maxlength' => '50')) !!}
                        </div>

                        <div class="form-group col-md-4">
                         {!! Form::label('cellphone', 'Celular:') !!}
                         {!! Form::text('cellphone', null, array('id' => 'phone', 'class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15', 'placeholder' => '(99)99999-9999')) !!}
                        </div>

                        <div class="form-group col-md-8">
                          {!! Form::label('indicator', 'Indicador/Contador:') !!}
                          {!! Form::text('indicator', null, array('rows' => 2, 'class' => 'form-control changeInputEnter', 'placeholder' => 'Nome', 'maxlength' => '50')) !!}
                        </div>

                        <div class="form-group col-md-4">
                          {!! Form::label('seller_id', 'Vendedor:', array('class' => 'required')) !!}
                          {!! Form::select('seller_id', $users, [], array('placeholder' => 'Selecione...', 'class' => 'form-control changeInputEnter', 'required')) !!}
                        </div>
                        </div>

                        <div class="col-md-12 text-center">
                        <br>
                         <button type="submit" class="btn btn-primary">Salvar</button>
                         <a class="btn btn-primary" href="{{ route('crm.index') }}"><div class='btj'>Voltar</div></a>
                        </div>

                        {!! Form::close() !!}
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                      </div>
                    </div>
                    <div id="tabs-2">
                    </div>
                    <div id="tabs-3">
                    </div>
                  </div>
                </div>
        </div>
    </div>
</div>
@endsection