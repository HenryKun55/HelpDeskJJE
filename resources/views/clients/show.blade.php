@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2 class="text-center">Dados do Cliente</h2>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-8 col-md-offset-2">
      <div>
        <br>
        <table class="table">
          <tr>
            <td><strong>Razão/Nome: </strong>{{ $client->name }}</td>
            <td><strong>Nome Fantasia: </strong>{{ $client->fantasy_name }}</td>
          </tr>
          <tr>
            <td><strong>CPF/CNPJ: </strong>{{ $client->cpf_cnpj }}</td>
            <td><strong>Email: </strong>{{ $client->email }}</td>
          </tr>
          <tr>
            <td><strong>Endereço: </strong>{{ $client->address }}</td>
            <td><strong>Bairro: </strong>{{ $client->district }}</td>
          </tr>
          <tr>
            <td><strong>Número: </strong>{{ $client->number }}</td>
            <td><strong>CEP: </strong>{{ $client->zip_code }}</td>
          </tr>
          <tr>
            <td><strong>Produtos Relacionados: </strong>{{ $client->related_products }}</td>
            <td><strong>Responsável: </strong>{{ $client->responsible }}</td>
          </tr>
          <tr>
            <td><strong>Complemento: </strong>{{ $client->complement }}</td>
            <td><strong>Cidade: </strong>{{ $client->city }}</td>
          </tr>
          <tr>
            <td><strong>Estado: </strong>{{ $client->state }}</td>
            <td><strong>Telefone: </strong>{{ $client->phone }}</td>
          </tr>
          <tr>
            <td><strong>Celular: </strong>{{ $client->phone_other }}</td>
            <td><strong>Setor Responsável: </strong>{{ $client->responsible_department }}</td>
          </tr>
        </table>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <br>
          <a class="btn btn-primary" href="{{ route('clients.index') }}">Voltar</a>
        </div>

      </div>
  </div>

</div>
</div>
@endsection
