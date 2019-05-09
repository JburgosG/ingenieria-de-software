@extends('layouts.header')
@section('title', 'Crear asignatura')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Crear asignatura</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ url('/subject') }}">Asignaturas</a>
                </li>
                <li class="active">
                    <strong>Crear asignatura</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::open(['method' => 'post', 'route' =>  ['subject.store'], 'id' => 'form_add_subject', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
                        @include('modules.subjects.partials.fields')
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
    {!! Html::script('js/modules/subjects.js') !!}
@endpush