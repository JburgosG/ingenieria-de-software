@extends('layouts.header')
@section('title', 'Editar Asignatura')
@section('content')

	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Editar Asignatura</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ url('/subjects') }}">Asignaturas</a>
                </li>
                <li class="active">
                    <strong>Editar Asignatura</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($subject, ['route' =>  ['subject.update', $subject->id], 'method' => 'put', 'id' => 'form_edit_subject', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
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