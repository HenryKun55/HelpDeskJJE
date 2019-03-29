@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

                <h4 class="text-center">Cadastro CRM</h4>

                <div class="panel-body" id="pbd">
                  <div id="tabs">
                    <ul>
                      <li><a href="#tabs-1">Cadastro</a></li>
                      <li><a href="#tabs-2">Tarefas</a></li>
                      <li><a href="#tabs-3">Histórico</a></li>
                    </ul>
                    <div id="tabs-1">

                      <div class="content-tab">

                        <div class="form-group col-md-8">
                         {!! Form::label('client', 'Cliente:', array('class' => 'required')) !!}
                         {!! Form::text('client', $crm->client, array('class' => 'form-control changeInputEnter', 'disabled' => 'disabled', 'required')) !!}
                        </div>

                        <div class="form-group col-md-4">
                         {!! Form::label('phone', 'Telefone:') !!}
                         {!! Form::text('phone', $crm->phone, array('id' => 'phone', 'class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15', 'disabled' => 'disabled')) !!}
                        </div>

                        <div class="form-group col-md-8">
                         {!! Form::label('email', 'Email:') !!}
                         {!! Form::text('email', $crm->email, array('class' => 'form-control changeInputEnter', 'disabled' => 'disabled')) !!}
                        </div>

                        <div class="form-group col-md-4">
                         {!! Form::label('cellphone', 'Celular:') !!}
                         {!! Form::text('cellphone', $crm->cellphone, array('id' => 'phone', 'class' => 'form-control changeInputEnter phone-mask', 'maxlength' => '15', 'disabled' => 'disabled')) !!}
                        </div>

                        <div class="form-group col-md-8">
                          {!! Form::label('indicator', 'Indicador/Contador:', array('class' => 'required')) !!}
                          {!! Form::text('indicator', $crm->indicator, array('rows' => 2, 'class' => 'form-control changeInputEnter', 'disabled' => 'disabled', 'required')) !!}
                        </div>

                        <div class="form-group col-md-4">
                          <strong>Vendedor:</strong>
                          {!! Form::select('seller_id', $users, @$crm->seller->id, array('class' => 'form-control changeInputEnter', 'disabled' => 'disabled', 'placeholder' => 'Nenhum')) !!}
                        </div>
                        <div class="col-md-12 text-center">
                        <br>
                         <a class="btn btn-primary" href="{{ route('crm.index') }}"><div class='btj'>Voltar</div></a>
                        </div>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                      </div>
                    </div>
                    <div id="tabs-2">
                      <div class="content-tab">
                        {!! Form::open(['method' => 'POST','route' => ['crm.update', $crm->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group col-md-4">
                          {!! Form::label('date', 'Data:', array('class' => 'required')) !!}
                          {!! Form::date('date', null, array('rows' => 2, 'class' => 'form-control changeInputEnter', 'required')) !!}
                        </div>

                        <div class="form-group col-md-4">
                          {!! Form::label('hour', 'Hora:', array('class' => 'required')) !!}
                          {!! Form::time('hour', null, array('class' => 'form-control changeInputEnter', 'required')) !!}
                        </div>

                        <div class="form-group col-md-4">
                          {!! Form::label('responsible_id', 'Responsável:', array('class' => 'required')) !!}
                          {!! Form::select('responsible_id', $users, [], array('placeholder' => 'Selecione...', 'class' => 'form-control changeInputEnter', 'required')) !!}
                        </div>

                        <div class="form-group col-md-4">
                          {!! Form::label('product', 'Produto/Serviço:', array('class' => 'required')) !!}
                          {!! Form::text('product', null, array('placeholder' => 'Ex: CoffCode' ,'class' => 'form-control changeInputEnter', 'required', 'maxlength' => '50')) !!}
                        </div>

                        <div class="form-group col-md-8">
                          {!! Form::label('status', 'Status:', array('class' => 'required')) !!}
                          {!! Form::select('status',
                            [
                                'Vendido'       => 'Vendido',
                                'Não Vendido'     => 'Não Vendido',
                                'Negociando'  => 'Negociando',
                                'Visitar'  => 'Visitar'
                            ],
                            null, ['placeholder' => 'Selecione...', 'id' => 'status', 'class'=>'form-control changeInputEnter', 'required', 'onchange' => 'schedule()']);
                          !!}
                        </div>
                        <div class="form-group col-md-12 datawrap">

                        </div>
                        <div class="form-group col-md-12">
                          {!! Form::label('description', 'Descrição da Ação:', array('class' => 'required')) !!}
                          {!! Form::textarea('description', null, array('rows' => 6, 'class' => 'form-control changeInputEnter', 'required', 'style' => 'resize:none;', 'maxlength' => '500')) !!}
                        </div>

                        <div class="col-md-12 text-center">
                          <br>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                          <a class="btn btn-primary" href="{{ route('crm.index') }}"><div class='btj'>Voltar</div></a>
                        </div>

                        {!! Form::close() !!}
                        <p>&nbsp;</p>
                      </div>
                    </div>
                    <div id="tabs-3">

                      @foreach($crm->crmActions as $action)
                      <div>
                        <table class="table table-bordered">
                          <th colspan="5">Ação: 00{{ ++$i }}</th>
                            <tr>
                              <td><strong>Data: </strong>{{ $action->date }}</td>
                              <td><strong>Hora: </strong>{{ $action->hour }}</td>
                              <td><strong>Responsável: </strong>{{ $action->responsible->name }}</td>
                            </tr>
                            <tr>
                              <td id="accordion" colspan="4">
                                <strong>Descrição:</strong>
                                @if(strlen($action->description) > 60)
                                <a id="cc" href="#c{{ $action->id }}" data-toggle="collapse" data-target="#c{{ $action->id }}"
                                class="collapsed glyphicon glyphicon-plus" style="float:right; text-decoration:none;"></a>
                                  <p id="cc">{{ substr($action->description, 0, 60)  }}...</p> <br>
                                    <ul class="collapse" id="c{{ $action->id }}" hidden>
                                      <li style="list-style:none;">{{ $action->description }}</li>
                                    </ul>
                                @else
                                  {{$action->description}}<br>
                                @endif
                              </td>
                            </tr>
                          </th>
                        </table>
                      </div>
                      @endforeach
                      <div class="col-md-12 text-center">
                        <a class="btn btn-primary" href="{{ route('crm.index') }}"><div class='btj'>Voltar</div></a>
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
