@extends('layouts.header')
@section('title', 'Editar Usuario')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Editar Usuario</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ url('/users') }}">Usuarios</a>
                </li>
                <li class="active">
                    <strong>Editar Usuario</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($user, ['route' =>  ['users.update', $user->id], 'method' => 'put', 'id' => 'form_edit_user', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
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