@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Novo Emitente</h2>
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
    {!! Form::open(array('route' => 'emitentes.store','method'=>'POST')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong class="required">Nome/Razão:</strong>
                        {!! Form::text('nome', null, array('id' => 'name', 'required', 'placeholder' => 'Nome/Razão','class' => 'form-control changeInputEnter', 'maxlength' => '50')) !!}
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong class="required">Nome Fantasia:</strong>
                        {!! Form::text('nome_fantasia', null, array('id' => 'fantasy-name', 'required', 'placeholder' => 'Nome Fantasia','class' => 'form-control changeInputEnter', 'maxlength' => '50')) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong class="required">Quant. Licenças:</strong>
                        {!! Form::text('quant_lic', null, array('id' => 'quant-lic', 'required', 'placeholder' => 'Ex: 3','class' => 'form-control changeInputEnter', 'maxlength' => '50')) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong class="required">CPF/CNPJ:</strong>
                        {!! Form::text('cpf_cnpj', null, array('id' => 'cnpj', 'required', 'placeholder' => 'CPF/CNPJ', 'onblur' => 'getEmit()', 'class' => 'form-control changeInputEnter')) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong class="required">Inscrição estadual:</strong>
                        {!! Form::text('insc_estadual', null, array('id' => 'insc-estadual', 'placeholder' => 'Inscrição estadual','class' => 'form-control changeInputEnter')) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong class="required">Email:</strong>
                        {!! Form::text('email', null, array('id' => 'email', 'required', 'placeholder' => 'Ex: email@exemplo.com','class' => 'form-control changeInputEnter', 'maxlength' => '50')) !!}
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">Telefone:</strong>
                        {!! Form::text('telefone', null, array('id' => 'phone', 'required', 'placeholder' => 'Ex: (81) 1234-5678','class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15')) !!}
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Celular:</strong>
                        {!! Form::text('celular', null, array('id' => 'phone-other', 'placeholder' => 'Ex: (81) 98765-4421','class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15')) !!}
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">Regime tributário:</strong>
                        {!! Form::select('crt_id', $crt,
                          null, ['placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter required']);
                        !!}
                    </div>
                </div>
       
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">CEP:</strong>
                        {!! Form::text('cep', null, array('id' => 'zip-code', 'required', 'placeholder' => 'CEP','class' => 'form-control changeInputEnter')) !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong class="required">Endereço:</strong>
                        {!! Form::text('logradouro', null, array('id' => 'street', 'required', 'placeholder' => 'Endereço','class' => 'form-control changeInputEnter', 'maxlength' => '50')) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong class="required">Número:</strong>
                        {!! Form::text('numero', null, array('id' => 'number', 'required', 'placeholder' => 'Número','class' => 'form-control changeInputEnter', 'maxlength' => '10')) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong class="required">Bairro:</strong>
                        {!! Form::text('bairro', null, array('id' => 'district', 'required', 'placeholder' => 'Bairro','class' => 'form-control changeInputEnter', 'maxlength' => '30')) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong class="required">Cidade:</strong>
                        {!! Form::text('municipio', null, array('id' => 'city','required', 'placeholder' => 'Cidade','class' => 'form-control changeInputEnter', 'maxlength' => '30')) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Complemento:</strong>
                        {!! Form::text('complemento', null, array('id' => 'complement', 'placeholder' => 'Complemento','class' => 'form-control changeInputEnter', 'maxlength' => '30')) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong class="required">UF:</strong>
                        {!! Form::text('uf', null, array('id' => 'uf', 'required', 'placeholder' => 'UF','class' => 'form-control changeInputEnter', 'maxlength' => '2')) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong class="required">Código UF:</strong>
                        {!! Form::text('cod_uf', null, array('id' => 'cod-uf', 'required','class' => 'form-control changeInputEnter', 'maxlength' => '2')) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong class="required">Código Município:</strong>
                        {!! Form::text('cod_municipio', null, array('id' => 'cod-mun', 'required','class' => 'form-control changeInputEnter', 'maxlength' => '2')) !!}
                    </div>
                </div>
              
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <hr>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-primary" href="{{ route('emitentes.index') }}">Voltar</a>
            </div>

        </div>
    {!! Form::close() !!}
</div>
<br>
<br>
@endsection
