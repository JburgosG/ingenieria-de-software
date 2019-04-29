@extends('layouts.header')
@section('title', 'Crear Usuario')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Nuevo Usuario</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ url('/users') }}">Usuarios</a>
            </li>
            <li class="active">
                <strong>Nuevo Usuario</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <span>Por favor seleccionar el tipo de usuario que desea crear.</span>
                    <div class="hr-line-dashed"></div>
                    <select class="form-control" id="select-group">
                        <option selected value="">Seleccionar</option>
                        <option value="admin">Administrador</option>
                        <option value="student">Estudiante</option>
                        <option value="teacher">Profesor</option>
                        <option value="godfather">Padrino</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-12 hide" id="forms-users">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    {!! Form::open(['method' => 'post', 'route' =>  ['users.store'], 'id' => 'form_add_user', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
                        {{ Form::hidden('group_id', 0, ['id' => 'group_id']) }}
                        @include('modules.users.partials.fields')
                        <div class="form-group text-right">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary _load" type="submit">
                                        <i class="fa fa-save"></i> Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    {!! Html::script('js/plugins/footable/footable.all.min.js') !!}
    {!! Html::script('js/modules/users.js') !!}
@endpush