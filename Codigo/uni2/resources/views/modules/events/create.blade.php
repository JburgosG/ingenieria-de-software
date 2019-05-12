@extends('layouts.header')
@section('title', 'Crear Actividades')
@section('content')

{!! Html::style('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') !!}

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Nuevo Actividad</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ url('/events') }}">Actividades</a>
            </li>
            <li class="active">
                <strong>Nuevo Actividad</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    {!! Form::open(['method' => 'post', 'route' =>  ['event.store'], 'id' => 'form_add_event', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}
                        @include('modules.events.partials.fields')
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
    {!! Html::script('js/plugins/iCheck/icheck.min.js') !!}
    {!! Html::script('js/modules/events.js') !!}
@endpush