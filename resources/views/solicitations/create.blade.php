@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h4 class="text-center">Novo Chamado</h4>

                <div class="panel-body"  id="pbd">
                  <div id="tabs" rows='8'>
                    <ul>
                      <li><a href="#tabs-1">Abertura</a></li>
                      <li><a href="#tabs-2" style="pointer-events:none;">Fechamento</a></li>
                      <li><a href="#tabs-3" style="pointer-events:none;">Histórico de alterações</a></li>
                    </ul>
                    <div id="tabs-1">
                      <h4 class="text-center">Dados do Cliente</h4>

                      <div class="form-group col-md-8">
                       {!! Form::label('name', 'Nome/Razão Social:', array('class' => 'required')) !!}
                       {!! Form::text('name', null, array('placeholder' => 'Nome', 'id' => 'name', 'class' => 'form-control changeInputEnter', 'required', 'maxlength' => '50')) !!}
                      </div>
                      <div class="form-group col-md-4">
                       {!! Form::label('phone', 'Telefone:') !!}
                       {!! Form::text('phone', null, array('id' => 'phone', 'placeholder' => 'Ex: (99) 91234-5678', 'class' => 'form-control phone-mask', 'disabled' => 'disabled')) !!}
                      </div>
                      <div class="form-group col-md-8">
                       {!! Form::label('email', 'E-mail:') !!}
                       {!! Form::text('email', null, array('id' => 'email', 'placeholder' => 'Ex: email@exemplo.com', 'class' => 'form-control', 'disabled' => 'disabled')) !!}
                      </div>
                      <div class="form-group col-md-4">
                       {!! Form::label('city', 'Cidade:') !!}
                       {!! Form::text('city', null, array('id' => 'city','placeholder' => 'Cidade', 'class' => 'form-control','disabled' => 'disabled')) !!}
                      </div>

                      <div class="col-md-12">
                        <h4 class="text-center">Dados do Chamado</h4>
                      </div>
                      {!! Form::open(array('route' => 'solicitations.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}

                      <div class="form-group col-md-12">
                        {!! Form::label('subject', 'Assunto:', array('class' => 'required')) !!}
                        {!! Form::text('subject', null, array('placeholder' => 'Assunto do chamado', 'rows' => 2, 'class' => 'form-control changeInputEnter', 'required', 'maxlength' => '50')) !!}
                      </div>
                      <div class="form-group col-md-6">
                        {!! Form::label('solicitation_type', 'Tipo de Solicitação:', array('class' => 'required')) !!}
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
                          null, ['placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter', 'required']);
                        !!}
                      </div>
                      <div class="form-group col-md-6">
                            {!! Form::label('occurrence_type', 'Tipo de Ocorrência:', array('class' => 'required')) !!}
                            {!! Form::select('occurrence_type', $occurrenceTypes, null, array('placeholder' => 'Selecione...', 'class' => 'form-control changeInputEnter', 'id' => 'occurrence_type', 'required')) !!}
                      </div>
                      <div class="form-group col-md-3">
                        {!! Form::label('priority', 'Prioridade:', array('class' => 'required')) !!}
                        {!! Form::select('priority',
                          [
                              'Alta'   => 'Alta',
                              'Média'  => 'Média',
                              'Baixa'  => 'Baixa'
                          ],
                          null, ['placeholder' => 'Selecione...', 'class'=>'form-control changeInputEnter', 'required']);
                        !!}
                      </div>
                      <div class="form-group col-md-3">
                            {!! Form::label('category', 'Categoria:', array('class' => 'required')) !!}
                            {!! Form::select('category', $categories, null, array('placeholder' => 'Selecione...', 'class' => 'form-control changeInputEnter', 'id' => 'category', 'required')) !!}
                      </div>
                      <div class="form-group col-md-3">
                        {!! Form::label('responsible_department_id', 'Setor do Responsável:', array('class' => 'required')) !!}
                        {!! Form::select('responsible_department_id', $departments, null, array('placeholder' => 'Selecione...', 'class' => 'form-control changeInputEnter', 'id' => 'responsible-department', 'onchange' => 'getr()', 'required')) !!}
                      </div>
                      <div class="form-group col-md-3">
                            {!! Form::label('responsible', 'Responsável:') !!}
                            <select class="form-control changeInputEnter" name="responsible_id" id="responsible">
                              <option value="" disabled selected>Selecione...</option>
                            </select>
                      </div>
                      <div class="form-group col-md-12">
                        {!! Form::label('solicitation_description', 'Descrição da Abertura:', array('class' => 'required')) !!}
                        {!! Form::textarea('solicitation_description', null, array('placeholder' => 'Descrição da abertura do chamado', 'rows' => 7, 'class' => 'form-control changeInputEnter', 'maxlength' => '500', 'style' => 'resize:none;', 'required')) !!}
                      </div>
                      <input type="hidden" name="cid" value="" id="client-id">
                      <div class="col-md-12 text-center">
                       <button type="submit" class="btn btn-primary">Salvar</button>
                       <a class="btn btn-primary" href="{{ route('solicitations.index') }}"><div class='btj'>Voltar</div></a>
                      </div>
                      {!! Form::close() !!}
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>

                    </div>
                    <div id="tabs-2">
                    </div>
                    <div id="tabs-3">
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
