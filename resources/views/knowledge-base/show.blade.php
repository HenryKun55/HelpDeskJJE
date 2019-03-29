@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2 class="text-center">Base de Conhecimento</h2>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-8 col-md-offset-2">
      <div>
        <br>
        <table class="table">
          <tr>
            <td><strong>Assunto: </strong>{{ $knowledgeBase->subject }}</td>
          </tr>
          <tr>
            <td><strong>Produto Relacionado: </strong>{{ $knowledgeBase->related_product }}</td>
          </tr>
        </table>
        <div class="text-center">
          <strong>Descrição:</strong>
        </div>
        <div>
          <div class="panel panel-default">
            <div class="panel-body">
              <p>
                {{ $knowledgeBase->description }}
              </p>
            </div>
          </div>

        </div>
        <table class="table">
          <tr>
            <td><strong>Arquivos: </strong></td>
          </tr>
          <tr>
            <td>
              @foreach ($knowledgeBase->files as $file)
                <li id="{{ $file->id }}" style="list-style:none;"><a target="_blank" href="{{ asset('storage/'.$file->filename) }}">{{ $file->filename }}</a></li>
              @endforeach
            </td>
          </tr>
        </table>




        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <br>
          <a class="btn btn-primary" href="{{ route('knowledge-bases.index') }}">Voltar</a>
        </div>

      </div>
  </div>

</div>
</div>
<br>
<br>
@endsection
