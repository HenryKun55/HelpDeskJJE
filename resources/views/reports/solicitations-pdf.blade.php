<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" type="text/css">
    <meta charset="utf-8">
    <title>Relatório de Chamados</title>
  </head>
  <body>
  <h1>Relatório de Chamados</h1>
  <div class="row">
    <table class="table">
      <tr>
        <th>Código</th>
        <th>Cliente</th>
        <th>Data/Hora da abertura</th>
        <th>Data/Hora do fechamento</th>
        <th>Técnico</th>
      </tr>
      @foreach ($data as $key => $solicitation)
        <tr>
          <td>{{ $solicitation->protocol_number }}</td>
          <td>{{ $solicitation->client->name }}</td>
          <td>{{ $solicitation->created_at->format('d/m/Y H:i') }}</td>
          <td>{{ $solicitation->closing_date }}</td>
          @if(@$solicitation->responsible->name)
          <td>{{@$solicitation->responsible->name}}</td>
          @else
          <td>Nenhum</td>
          @endif
        </tr>
      @endforeach
    </table>
  </div>
  </body>
</html>
