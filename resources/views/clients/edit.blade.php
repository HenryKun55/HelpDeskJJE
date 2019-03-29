@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Editar Cliente</h2>
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
{!! Form::model($client, ['method' => 'PATCH','route' => ['clients.update', $client->id]]) !!}
{{ csrf_field() }}
<div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nome/Razão:</strong>
                {!! Form::text('name', $client->name, array('id' => 'name', 'placeholder' => 'Nome/Razão','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nome Fantasia:</strong>
                {!! Form::text('fantasy_name', $client->fantasy_name, array('id' => 'fantasy-name', 'placeholder' => 'Nome Fantasia','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>CPF/CNPJ:</strong>
                {!! Form::text('cpf_cnpj', $client->cpf_cnpj, array('id' => 'cpfcnpj', 'placeholder' => 'CPF','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', $client->email, array('id' => 'email', 'placeholder' => 'Email','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Telefone:</strong>
                {!! Form::text('phone', $client->phone, array('id' => 'phone', 'placeholder' => 'Telefone','class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15')) !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Celular:</strong>
                {!! Form::text('phone_other', $client->phone_other, array('id' => 'phone-other', 'placeholder' => 'Celular','class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15')) !!}
            </div>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                {!! Form::label('related_products', 'Produtos Relacionados:') !!}
                {!! Form::select('related_products',
                  [
                      'Sistema Control'   => 'Sistema Control',
                      'Sistema CoffCode'   => 'Sistema CoffCode',
                      'Sistema TEF'   => 'Sistema TEF',
                      'Trier Sistemas' => 'Trier Sistemas',
                      'Outros'  => 'Outros'
                  ],
                  $client->related_products, ['placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter required']);
                !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Responsável:</strong>
                {!! Form::text('responsible', $client->responsible, array('id' => 'responsible', 'placeholder' => 'Responsável','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                {!! Form::label('responsible_department', 'Setor do Responsável:') !!}
                {!! Form::select('responsible_department',
                  [
                      'Comercial'   => 'Comercial',
                      'Proprietário'   => 'Proprietário',
                      'Gerente'   => 'Gerente',
                      'Funcionário' => 'Funcionário',
                      'Outros'  => 'Outros'
                  ],
                  $client->responsible_department, ['placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter required']);
                !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>CEP:</strong>
                {!! Form::text('zip_code', $client->zip_code, array('id' => 'zip-code', 'placeholder' => 'CEP','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Endereço:</strong>
                {!! Form::text('address', $client->address, array('id' => 'street', 'placeholder' => 'Endereço','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1">
            <div class="form-group">
                <strong>Número:</strong>
                {!! Form::text('number', $client->number, array('id' => 'number', 'placeholder' => 'Número','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Complemento:</strong>
                {!! Form::text('complement', $client->complement, array('id' => 'complement', 'placeholder' => 'Complemento','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Bairro:</strong>
                {!! Form::text('district', $client->district, array('id' => 'district', 'placeholder' => 'Bairro','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Cidade:</strong>
                {!! Form::text('city', $client->city, array('id' => 'city', 'placeholder' => 'Cidade','class' => 'form-control changeInputEnter')) !!}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
                <strong>UF:</strong>
                {!! Form::text('state', $client->state, array('id' => 'uf', 'placeholder' => 'UF','class' => 'form-control changeInputEnter')) !!}
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
@endsection
