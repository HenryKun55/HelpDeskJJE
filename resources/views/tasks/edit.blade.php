@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

                <h4 class="text-center">Tarefas</h4>

                <div class="panel-body" id="pbd">
                  <div id="tabs">
                    <ul>
                      <li><a href="#tabs-1">Cadastro</a></li>
                      <li><a href="#tabs-2">Tarefas</a></li>
                      <li><a href="#tabs-3">Histórico</a></li>
                    </ul>
                    <div id="tabs-1">

                      <div class="content-tab">

                        <div class="form-group col-md-9">
                         {!! Form::label('description', 'Descrição:', array('class' => 'required')) !!}
                         {!! Form::text('description', $task->description, array('class' => 'form-control changeInputEnter', 'disabled' => 'disabled', 'required')) !!}
                        </div>

                        <div class="form-group col-md-3">
                         {!! Form::label('priority', 'Prioridade:', array('class' => 'required')) !!}
                         {!! Form::text('priority', $task->priority, array('class' => 'form-control changeInputEnter', 'disabled' => 'disabled', 'required')) !!}
                        </div>

                        <div class="form-group col-md-12">
                         {!! Form::label('comment', 'Comentário:') !!}
                         {!! Form::textarea('comment', $task->comment, array('rows' => 3, 'class' => 'form-control', 'style' => 'resize:none;', 'maxlength' => '500', 'disabled' => 'disabled')) !!}
                        </div>
                        <div class="col-md-12 text-center">
                        <br>
                         <a class="btn btn-primary" href="{{ route('tasks.index') }}"><div class='btj'>Voltar</div></a>
                        </div>
                        <p>&nbsp;</p>
                      </div>
                    </div>
                    <div id="tabs-2">
                      <div class="content-tab">
                        {!! Form::open(['method' => 'PUT','route' => ['tasks.update', $task->id]]) !!}
                        <div class="form-group col-md-4">
                          {!! Form::label('date', 'Data:', array('class' => 'required')) !!}
                          {!! Form::date('date', null, array('rows' => 2, 'class' => 'form-control changeInputEnter', 'required')) !!}
                        </div>

                        <div class="form-group col-md-4">
                          {!! Form::label('hour', 'Hora:', array('class' => 'required')) !!}
                          {!! Form::time('hour', null, array('class' => 'form-control changeInputEnter', 'required')) !!}
                        </div>

                        <div class="form-group col-md-4">
                          {!! Form::label('status', 'Status:', array('class' => 'required')) !!}
                          {!! Form::select('status',
                            [
                                'A Fazer'       => 'A Fazer',
                                'Feito'     => 'Feito',
                                'Fazendo'  => 'Fazendo'
                            ],
                            null, ['placeholder' => 'Selecione...', 'id' => 'status', 'class'=>'form-control changeInputEnter', 'required', 'onchange' => 'schedule()']);
                          !!}
                        </div>

                        <div class="form-group col-md-12 datawrap">

                        </div>
                        <div class="form-group col-md-12">
                          {!! Form::label('comment', 'Comentário:', array('class' => 'required')) !!}
                          {!! Form::textarea('comment', null, array('rows' => 3, 'class' => 'form-control changeInputEnter', 'required', 'style' => 'resize:none;', 'maxlength' => '500')) !!}
                        </div>

                        <div class="col-md-12 text-center">
                          <br>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                          <a class="btn btn-primary" href="{{ route('tasks.index') }}"><div class='btj'>Voltar</div></a>
                        </div>

                        {!! Form::close() !!}
                        <p>&nbsp;</p>
                      </div>
                    </div>
                    <div id="tabs-3">
                      @foreach($task->taskActions as $action)
                        <div>
                          <table class="table table-bordered">
                            <th colspan="5">Ação: 00{{ ++$i }}</th>
                              <tr>
                                <td><strong>Data: </strong>{{ $action->date }}</td>
                                <td><strong>Hora: </strong>{{ $action->hour }}</td>
                                <td><strong>Status: </strong>{{ $action->status }}</td>
                                <td><strong>Prioridade: </strong>{{ $action->priority }}</td>
                              </tr>
                              <tr>
                                <td id="accordion" colspan="4">
                                  <strong>Comentário:</strong>
                                  @if(strlen($action->comment) > 60)
                                  <a id="cc" href="#c{{ $action->id }}" data-toggle="collapse" data-target="#c{{ $action->id }}"
                                  class="collapsed glyphicon glyphicon-plus" style="float:right; text-decoration:none;"></a>
                                    <p id="cc">{{ substr($action->comment, 0, 60)  }}...</p> <br>
                                      <ul class="collapse" id="c{{ $action->id }}" hidden>
                                        <li style="list-style:none;">{{ $action->comment }}</li>
                                      </ul>
                                  @else
                                    {{$action->comment}}<br>
                                  @endif
                                </td>
                              </tr>
                            </th>
                          </table>
                        </div>
                      @endforeach
                      
                      <div class="col-md-12 text-center">
                        <a class="btn btn-primary" href="{{ route('tasks.index') }}"><div class='btj'>Voltar</div></a>
                      </div>
                      <p>&nbsp;</p>
                    </div>
                  </div>
                  <div>
                    <p>&nbsp;</p>
                  </div>
                </div>

        </div>
    </div>
</div>
@endsection
