@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Emitentes</h2>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xs-6">
                <a
                    href="{{route('emitentes.create')}}"
                    title='Add  Users'
                    class='add-anchor add_button btn btn-primary btn-flat'>
                    <i class="fa fa-plus-circle"></i>
                    <span class="add">Novo emitente</span>
                </a>
            </div>
        </div></br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nome/Razão</th>
                <th>Licenças</th>
                <th width="150px">Opções</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $emit)
            <tr>
                <td>{{$emit->nome}}</td>
                <td>{{count($emit->serials)}}</td>
                <td>
                    <a
                        href="{{ route('emitentes.show', $emit->id) }}"
                        title='Visualizar'
                        class='add-anchor add_button btn btn-info btn-flat'>
                        <i class="fa fa-eye"></i>
                    </a>
                    <a
                        href=""
                        title='Editar'
                        class='add-anchor add_button btn btn-primary btn-flat'>
                            <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach            
        </tbody>
        <tfoot>
            <tr>
                <th>Nome/Razão</th>
                <th>Serial</th>
                <th width="150px">Opções</th>
            </tr>
        </tfoot>
    </table><br><br>
</div>
@endsection
