@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

                <h4 class="text-center">Novo Chamado</h4>

                <div class="panel-body" id="pbd">
                  <div id="tabs">
                    <ul>
                      <li><a href="#tabs-1">Abertura</a></li>
                      <li><a href="#tabs-2">Fechamento</a></li>
                      <li><a href="#tabs-3">Histórico de alterações</a></li>
                    </ul>
                    <div id="tabs-1">
                      <h4 class="text-center">Dados do Cliente</h4>

                      <div class="form-group col-md-8">
                       {!! Form::label('name', 'Nome/Razão Social:') !!}
                       {!! Form::text('name', $solicitation->client->name, array('id' => 'name', 'class' => 'form-control changeInputEnter', 'disabled' => 'disabled')) !!}
                      </div>
                      <div class="form-group col-md-4">
                       {!! Form::label('phone', 'Telefone:') !!}
                       {!! Form::text('phone', $solicitation->client->phone, array('id' => 'phone', 'class' => 'form-control  phone-mask', 'disabled' => 'disabled')) !!}
                      </div>
                      <div class="form-group col-md-8">
                       {!! Form::label('email', 'E-mail:') !!}
                       {!! Form::text('email', $solicitation->client->email, array('id' => 'email', 'class' => 'form-control ', 'disabled' => 'disabled')) !!}
                      </div>
                      <div class="form-group col-md-4">
                       {!! Form::label('city', 'Cidade:') !!}
                       {!! Form::text('city', $solicitation->client->city, array('id' => 'city', 'class' => 'form-control ','disabled' => 'disabled')) !!}
                      </div>
                      <h4 class="text-center">Dados do Chamado</h4>

                      <div class="form-group col-md-12">
                        {!! Form::label('subject', 'Assunto:') !!}
                        {!! Form::text('subject', $solicitation->subject, array('rows' => 2, 'class' => 'form-control changeInputEnter', 'disabled' => 'disabled', 'style' => ' maxlength:50')) !!}
                      </div>
                      <div class="form-group col-md-6">
                        {!! Form::label('solicitation_type', 'Tipo de Solicitação:') !!}
                        {!! Form::select('solicitation_type',
                          [
                              'Telefone'                                      => 'Telefone',
                              'E-mail'                                        => 'E-mail',
                              'Chat'                                          => 'Chat',
                              'Abordagem Pessoal'                             => 'Abordagem Pessoal',
                              'WhatsApp'                                      => 'WhatsApp',
                              'SMS'                                           => 'SMS',
                              'Outros'                                        => 'Outros'
                          ],
                          $solicitation->solicitation_type, ['placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter', 'disabled' => 'disabled']);
                        !!}
                      </div>
                      <div class="form-group col-md-6">
                        {!! Form::label('occurrence_type', 'Tipo de Ocorrência:') !!}
                        {!! Form::select('occurrence_type',
                          $occurrenceTypes, $solicitation->occurrence_type, ['class'=>'form-control changeInputEnter', 'disabled' => 'disabled']);
                        !!}
                      </div>
                      <div class="form-group col-md-3">
                        {!! Form::label('priority', 'Prioridade:') !!}
                        {!! Form::select('priority',
                          [
                              'Alta'   => 'Alta',
                              'Média'  => 'Média',
                              'Baixa'  => 'Baixa'
                          ],
                          $solicitation->priority, ['placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter', 'disabled' => 'disabled']);
                        !!}
                      </div>
                      <div class="form-group col-md-3">
                        {!! Form::label('category', 'Categoria:') !!}
                        {!! Form::select('category',
                          $categories, $solicitation->category, ['class'=>'form-control changeInputEnter', 'disabled' => 'disabled']);
                        !!}
                      </div>
                      <div class="form-group col-md-3">
                        {!! Form::label('responsible_department', 'Setor do Responsável:') !!}
                        {!! Form::select('responsible_department',
                          $departments, @$solicitation->responsible->department, ['class'=>'form-control changeInputEnter', 'disabled' => 'disabled']);
                        !!}
                      </div>
                      <div class="form-group col-md-3">
                        {!! Form::label('responsible', 'Responsável:') !!}
                        {!! Form::select('responsible',
                          $users, @$solicitation->responsible->name, ['class'=>'form-control changeInputEnter', 'disabled' => 'disabled', 'placeholder' => 'Nenhum']);
                        !!}
                      </div>
                      <div class="form-group col-md-12">
                        {!! Form::label('solicitation_description', 'Descrição da Abertura:') !!}
                        {!! Form::textarea('solicitation_description', $solicitation->solicitation_description, array('rows' => 7, 'class' => 'form-control changeInputEnter', 'disabled' => 'disabled', 'style' => 'resize:none; maxlength:500')) !!}
                      </div>
                      <input type="hidden" name="client_id" value="" id="client-id">
                      <div class="col-md-12 text-center">

                      <a class="btn btn-primary" href="{{ route('solicitations.index') }}"><div class='btj'>Voltar</div></a>
                      </div>

                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                    </div>
                    <div id="tabs-2">
                    {!! Form::open(['method' => 'POST','route' => ['solicitations.update', $solicitation->id], 'enctype' => 'multipart/form-data']) !!}
                      <div class="form-group col-md-4">
                        {!! Form::label('service_mode', 'Forma de Atendimento:', array('class' => 'required')) !!}
                        {!! Form::select('service_mode',
                          [
                              'Chat'       => 'Chat',
                              'E-mail'       => 'E-mail',
                              'Telefone'       => 'Telefone',
                              'Acesso Remoto'       => 'Acesso Remoto',
                              'Internamente'       => 'Internamente',
                              'Presencial'       => 'Presencial',
                              'Whatsapp'       => 'Whatsapp',
                              'SMS'       => 'SMS'
                          ],
                          null, ['placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter', 'required']);
                        !!}
                      </div>
                      <div class="form-group col-md-4">
                            {!! Form::label('status', 'Status:', array('class' => 'required')) !!}
                            {!! Form::select('status', $statuses, null, array('placeholder' => 'Selecione...', 'class' => 'form-control changeInputEnter', 'id' => 'status', 'required')) !!}
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group">
                            {!! Form::label('responsible_id', 'Responsável:', array('class' => 'required')) !!}
                            {!! Form::select('responsible_id', $users, [], array('placeholder' => 'Selecione...', 'class' => 'form-control changeInputEnter', 'required')) !!}
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        {!! Form::label('description', 'Descrição de Fechamento:', array('class' => 'required')) !!}
                        {!! Form::textarea('description', null, array('rows' => 7, 'class' => 'form-control changeInputEnter', 'required','maxlength' => '500', 'style' => 'resize:none;')) !!}
                      </div>
                      <div class="form-group col-md-4">
                        {!! Form::label('attach', 'Anexar Arquivo:') !!}<br>
                        <i>{!! Form::label('attach', 'Suportados: *.[bmp,jpg,png,pdf]') !!}</i>
                        {!! Form::file('photos[]', ['multiple', 'id' => 'file']) !!}
                      </div>
                      <input type="hidden" name="solicitation_id" value="{{ $solicitation->id }}">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-primary" href="{{ route('solicitations.index') }}"><div class='btj'>Voltar</div></a>
                      </div>
                      {!! Form::close() !!}
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>

                    </div>
                    <div id="tabs-3">

                        @foreach ($solicitation->actions as $action)
                        <table class="table table-bordered">
                        <th colspan="5">Ação: 00{{ ++$i }}</th>
                        <tr>
                          <td><strong>Forma de Atendimento: </strong>{{ $action->service_mode }}</td>
                          <td><strong>Status: </strong>{{ $action->status }}</td>
                          <td><strong>Responsável: </strong>{{ $action->responsible->name }}</td>
                          <td><strong>Data/Hora: </strong>{{ $action->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                          <td id="accordion" colspan="4">
                            <strong>Descrição:</strong>
                            @if((strlen($action->description) > 60) and ($action->solicitationsFiles->count() >= 1))
                              <a id="cc" href="#c{{ $action->id }}" data-toggle="collapse" data-target="#c{{ $action->id }}"
                              class="collapsed glyphicon glyphicon-plus" style="float:right; text-decoration:none;"></a>

                              <p id="cc">{{ substr($action->description, 0, 60)  }}...</p> <br>

                              <ul class="collapse" id="c{{ $action->id }}" hidden>
                              <li style="list-style:none;">{{ $action->description }}</li>
                              @foreach ($action->solicitationsFiles as $file)
                                <li id="{{ $file->id }}" style="list-style:none;"><a target="_blank" href="{{ asset('storage/'.$file->filename) }}">{{ $file->filename }}</a></li>

                              @endforeach
                            @elseif((strlen($action->description) < 60)  and ($action->solicitationsFiles->count() >= 1))
                              <a id="cc" href="#c{{ $action->id }}" data-toggle="collapse" data-target="#c{{ $action->id }}"
                              class="collapsed glyphicon glyphicon-plus" style="float:right; text-decoration:none;"></a>

                              <p id="cc">{{$action->description}}</p> <br>

                              <ul class="collapse" id="c{{ $action->id }}" hidden>
                                <li style="list-style:none;">{{ $action->description }}</li>
                                @foreach ($action->solicitationsFiles as $file)
                                  <li id="{{ $file->id }}" style="list-style:none;"><a target="_blank" href="{{ asset('storage/'.$file->filename) }}">{{ $file->filename }}</a></li>

                                @endforeach
                            @else
                              <p id="cc">{{$action->description}}</p> <br>
                            @endif
                            </ul>
                          </td>
                        </tr>
                        </table>
                        @endforeach
                      <div class="col-md-12 text-center">
                        <a class="btn btn-primary" href="{{ route('solicitations.index') }}"><div class='btj'>Voltar</div></a>
                      </div>
                      <p>&nbsp;</p>
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
