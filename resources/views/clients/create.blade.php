@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Novo Cliente</h2>
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
    {!! Form::open(array('route' => 'clients.store','method'=>'POST')) !!}
    {{ csrf_field() }}
        <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong class="required">Nome/Razão:</strong>
                        {!! Form::text('name', null, array('id' => 'name', 'required', 'placeholder' => 'Nome/Razão','class' => 'form-control changeInputEnter', 'maxlength' => '50')) !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong class="required">Nome Fantasia:</strong>
                        {!! Form::text('fantasy_name', null, array('id' => 'fantasy-name', 'required', 'placeholder' => 'Nome Fantasia','class' => 'form-control changeInputEnter', 'maxlength' => '50')) !!}
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">CPF/CNPJ:</strong>
                        {!! Form::text('cpf_cnpj', null, array('id' => 'cpfcnpj', 'required', 'placeholder' => 'CPF','class' => 'form-control changeInputEnter')) !!}
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">Email:</strong>
                        {!! Form::text('email', null, array('id' => 'email', 'required', 'placeholder' => 'Ex: email@exemplo.com','class' => 'form-control changeInputEnter', 'maxlength' => '50')) !!}
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">Telefone:</strong>
                        {!! Form::text('phone', null, array('id' => 'phone', 'required', 'placeholder' => 'Ex: (81) 1234-5678','class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15')) !!}
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Celular:</strong>
                        {!! Form::text('phone_other', null, array('id' => 'phone-other', 'placeholder' => 'Ex: (81) 98765-4321','class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15')) !!}
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">Produtos relacionados:</strong>
                        {!! Form::select('related_products',
                          [
                              'Sistema Control'   => 'Sistema Control',
                              'Sistema CoffCode'   => 'Sistema CoffCode',
                              'Sistema TEF'   => 'Sistema TEF',
                              'Trier Sistemas' => 'Trier Sistemas',
                              'Outros'  => 'Outros'
                          ],
                          null, ['required', 'placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter required']);
                        !!}
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">Responsável:</strong>
                        {!! Form::text('responsible', null, array('id' => 'responsible', 'required', 'placeholder' => 'Responsável','class' => 'form-control changeInputEnter', 'maxlength' => '20')) !!}
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">Setor do responsável:</strong>
                        {!! Form::select('responsible_department',
                          [
                              'Comercial'   => 'Comercial',
                              'Proprietário'   => 'Proprietário',
                              'Gerente'   => 'Gerente',
                              'Funcionário' => 'Funcionário',
                              'Outros'  => 'Outros'
                          ],
                          null, ['required', 'placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter required']);
                        !!}
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong class="required">CEP:</strong>
                        {!! Form::text('zip_code', null, array('id' => 'zip-code', 'required', 'placeholder' => 'CEP','class' => 'form-control changeInputEnter')) !!}
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong class="required">Endereço:</strong>
                        {!! Form::text('address', null, array('id' => 'street', 'required', 'placeholder' => 'Endereço','class' => 'form-control changeInputEnter', 'maxlength' => '50')) !!}
                    </div>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1">
                    <div class="form-group">
                        <strong class="required">Número:</strong>
                        {!! Form::text('number', null, array('id' => 'number', 'required', 'placeholder' => 'Número','class' => 'form-control changeInputEnter', 'maxlength' => '10')) !!}
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Complemento:</strong>
                        {!! Form::text('complement', null, array('id' => 'complement', 'placeholder' => 'Complemento','class' => 'form-control changeInputEnter', 'maxlength' => '30')) !!}
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong class="required">Bairro:</strong>
                        {!! Form::text('district', null, array('id' => 'district', 'required', 'placeholder' => 'Bairro','class' => 'form-control changeInputEnter', 'maxlength' => '30')) !!}
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong class="required">Cidade:</strong>
                        {!! Form::text('city', null, array('id' => 'city','required', 'placeholder' => 'Cidade','class' => 'form-control changeInputEnter', 'maxlength' => '30')) !!}
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong class="required">UF:</strong>
                        {!! Form::text('state', null, array('id' => 'uf', 'required', 'placeholder' => 'UF','class' => 'form-control changeInputEnter', 'maxlength' => '2')) !!}
                    </div>
                </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <hr>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-primary" href="{{ route('clients.index') }}">Voltar</a>
            </div>

        </div>
    {!! Form::close() !!}
</div>
<br>
<br>
@endsection
