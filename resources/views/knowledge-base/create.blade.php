@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Inserir Base de Conhecimento</h2>
            </div>
            <hr>
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
    {!! Form::open(array('route' => 'knowledge-bases.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
    {{ csrf_field() }}
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    {!! Form::label('subject', 'Assunto:', array('class' => 'required')) !!}
                    {!! Form::text('subject', null, array('placeholder' => 'Assunto','class' => 'form-control', 'required', 'style' => ' maxlength:50')) !!}
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('related_product', 'Produto Relacionado:', array('class' => 'required')) !!}
                    {!! Form::select('related_product',
                      [
                          'Sistema Control'   => 'Sistema Control',
                          'Sistema CoffCode'   => 'Sistema CoffCode',
                          'Sistema TEF'   => 'Sistema TEF',
                          'Trier Sistemas' => 'Trier Sistemas',
                          'Outros'  => 'Outros'
                      ],
                      null, ['placeholder' => 'Selecione...', 'class'=>'form-control', 'required']);
                    !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('description', 'Descrição:', array('class' => 'required')) !!}
                    {!! Form::textarea('description', null, array('placeholder' => 'Descrição','class' => 'form-control', 'required', 'style' => 'resize:none; maxlength:500;')) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  {!! Form::label('attach', 'Anexar Arquivo:') !!}<br>
                  <i>{!! Form::label('attach', 'Suportados: *.[bmp,jpg,png,pdf]') !!}</i>
                  {!! Form::file('photos[]', ['multiple', 'id' => 'file']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-primary" href="{{ route('knowledge-bases.index') }}">Voltar</a>
            </div>
          </div>
        </div>
    {!! Form::close() !!}
</div>
<br>
<br>
@endsection
