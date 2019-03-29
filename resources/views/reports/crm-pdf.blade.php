<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" type="text/css">
    <meta charset="utf-8">
    <title>Relatório CRM</title>
  </head>
  <body>
  <h1>Relatório de CRM</h1>
  <div class="row">
    <table class="table">
      <tr>
        <th>Cliente</th>
        <th>Indicador</th>
        <th>Vendedor</th>
        <th>Data de abertura</th>
        <th>Status</th>
      </tr>
      @foreach ($data as $key => $crm)
      <tr>
        <td>{{ @$crm->client }}</td>
        @if(@$crm->indicator)
            <td>{{@$crm->indicator}}</td>
        @else
            <td>Nenhum</td>
        @endif
        <td>{{ @$crm->seller->name }}</td>
        <td>{{ $crm->created_at->format('d-m-Y') }}</td>
        <td>{{ @$crm->status }}</td>
      </tr>
      @endforeach
    </table>
  </div>

  </body>
</html>
