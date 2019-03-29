@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
                <h4 class="text-center">Cadastro de Tarefa</h4>
                <div class="panel-body" id="pbd">
                  <div id="tabs">
                    <ul>
                      <li><a href="#tabs-1">Tarefa</a></li>
                      <li><a href="#tabs-2" style="pointer-events:none;">Ação</a></li>
                      <li><a href="#tabs-3" style="pointer-events:none;">Histórico</a></li>
                    </ul>
                    <div id="tabs-1">

                      <div class="content-tab">
                        {!! Form::open(array('route' => 'tasks.store','method'=>'POST')) !!}
                        {{ csrf_field() }}

                        <div class="form-group col-md-9">
                         {!! Form::label('description', 'Descrição:', array('class' => 'required')) !!}
                         {!! Form::text('description', null, array('class' => 'form-control changeInputEnter', 'required', 'placeholder' => 'Descrição', 'maxlength' => '50')) !!}
                        </div>

                        <div class="form-group col-md-3">
                          {!! Form::label('priority', 'Prioridade:', array('class' => 'required')) !!}
                          {!! Form::select('priority',
                            [
                                'Alta'       => 'Alta',
                                'Média'     => 'Média',
                                'Baixa'  => 'Baixa'
                            ],
                            null, ['placeholder' => 'Selecione...', 'id' => 'priority', 'class'=>'form-control changeInputEnter', 'required', 'onchange' => 'schedule()']);
                          !!}
                        </div>

                        <div class="form-group col-md-12">
                         {!! Form::label('comment', 'Comentário:', array('class' => 'required')) !!}
                         {!! Form::textarea('comment', null, array('rows' => 3, 'class' => 'form-control changeInputEnter', 'required', 'style' => 'resize:none;', 'maxlength' => '500')) !!}
                        </div><br><br><br>

                        </div>

                        <div class="col-md-12 text-center">
                        <br>
                         <button type="submit" class="btn btn-primary">Salvar</button>
                         <a class="btn btn-primary" href="{{ route('crm.index') }}"><div class='btj'>Voltar</div></a>
                        </div><br><br><br><br><br><br><br><br><br><br>

                        {!! Form::close() !!}
                        
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