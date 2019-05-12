@extends('layouts.header')
@section('title', 'Editar Evento')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Editar Evento</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ url('/events') }}">Eventos</a>
                </li>
                <li class="active">
                    <strong>Editar Evento</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($event, ['route' =>  ['event.update', $event->id], 'method' => 'put', 'id' => 'form_edit_event', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
                        @include('modules.events.partials.fields')
                        <div class="form-group text-right">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" type="submit">
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
    {!! Html::script('js/modules/events.js') !!}
@endpush