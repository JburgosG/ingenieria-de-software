@extends('layouts.header')
@section('title', 'Ver Asignatura')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><b>Bienvenidos al curso</b> {{ $subject->name }}</h2>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#tab-1" aria-expanded="true">
                                    <i class="fa fa-bookmark"></i> Introducción
                                </a>
                            </li>
                            @if(_user()->group->id == 1 || _user()->group->id == 3)
                            <li>
                                <a data-toggle="tab" href="#tab-2" aria-expanded="false">
                                    <i class="fa fa-list-ul"></i> Listado de estudiantes
                                </a>
                            </li>
                            @endif
                            @if(_user()->group->id == 1)
                            <li>
                                <a data-toggle="tab" href="#tab-6" aria-expanded="false">
                                    <i class="fa fa-clock-o"></i> Horario
                                </a>
                            </li>
                            @endif
                            <li>
                                <a data-toggle="tab" href="#tab-3" aria-expanded="false">
                                    <i class="fa fa-file-text-o"></i> Material de apoyo
                                </a>
                            </li>
                            @if(_user()->group->id == 2 || _user()->group->id == 3)
                            <li>
                                <a data-toggle="tab" href="#tab-4" aria-expanded="false">
                                    <i class="fa fa-pencil"></i> Actividades
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-5" aria-expanded="false">
                                    <i class="fa fa-check"></i> Calificaciones
                                </a>
                            </li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <p>{{ $subject->description }}</p>
                                </div>
                            </div>
                            @if(_user()->group->id == 1 || _user()->group->id == 3)
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <div id="content-students">
                                        @include('modules.subjects.partials.students')
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                    @if(_user()->group->id == 1 || _user()->group->id == 3)
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <button class="btn btn-success btn-sm btn-create col-lg-12" type="submit" data-toggle="modal" data-target="#uploadFiles">
                                                <i class="fa fa-upload"></i> Cargar Documento
                                            </button>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    @endif
                                    @if(!empty($documents))
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @forelse($documents as $row)
                                            <div class="file-box" id="document_{{ $row->id }}">
                                                <div class="file dialog">
                                                    <a href="{{ url('download/' . $row->path . '/' . $row->name) }}" download>
                                                        <span class="corner"></span>
                                                        <div class="icon">
                                                            <i class="fa fa-{{ _iconFile($row->type) }}"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            {{ substr($row->name, 0, 25) }}
                                                            <br/>
                                                            <small>{{ date_spanish_full_short($row->created_at) }}</small>
                                                        </div>
                                                    </a>
                                                    @if(_user()->group->id == 1 || _user()->group->id == 3)
                                                    <a class="delete-document close-thik" title="Eliminar Documento" data-document_id="{{ $row->id }}"></a>
                                                    @endif
                                                </div>
                                            </div>
                                            @empty
                                            <div class="alert alert-warning">
                                                <i class="fa fa-warning"></i> No existe material de apoyo para esta asignatura.
                                            </div>
                                            @endforelse
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div id="tab-4" class="tab-pane">
                                <div class="panel-body">
                                    @if(_user()->group->id == 3)
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <button class="btn btn-success btn-sm btn-create col-lg-12" data-toggle="modal" data-target="#newActivity">
                                                <i class="fa fa-plus"></i> Nueva actividad
                                            </button>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    @endif
                                    @if(!empty($activities))
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                            <th>Nombre</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                            </thead>
                                            <tbody>
                                                @foreach($activities as $row)
                                                <tr>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ date_spanish_full_short($row->start_date) }}</td>
                                                    <td>{{ date_spanish_full_short($row->end_date) }}</td>
                                                    <td>{{ _time($row->start_hour) }}</td>
                                                    <td>{{ _time($row->end_hour) }}</td>                                                    
                                                    <td>
                                                        <span class="label label-info pointer">
                                                            <i class="fa fa-eye"></i> Ver
                                                        </span>
                                                    </td>                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div id="tab-5" class="tab-pane">
                                <div class="panel-body">
                                    <div class="alert alert-info">
                                        <i class="fa fa-info"></i> Estamos trabajando en ello...
                                    </div>
                                </div>
                            </div>
                            <div id="tab-6" class="tab-pane">
                                <div class="panel-body">
                                    <span>A continuación digite todos los campos del formulario.</span>
                                    <div class="hr-line-dashed"></div>
                                    {!! Form::open(['method' => 'post', 'route' =>  ['schedule'], 'id' => 'form_add_schedules', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
                                    {!! Form::hidden('subject_id', encrypt($subject->id)) !!}
                                    <div class="form-group row">
                                        <div class="col-lg-2">
                                            <a class="btn btn-info btn-sm col-lg-12" id="addDay">
                                                <i class="fa fa-plus"></i> Nuevo dia
                                            </a>
                                        </div>
                                    </div>
                                    @if(count($schedule) == 0)
                                    <div class="form-group">
                                        <div class="hr-line-dashed"></div>
                                        <div class="col-md-6">
                                            {!! Form::label('day', 'Dia de la semana *') !!}
                                            {!! Form::select('day_id[]', $days, null ,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::label('start', 'Hora Inicio *') !!}
                                            {!! Form::time('start[]', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::label('end', 'Hora fin *') !!}
                                            {!! Form::time('end[]', null, ['class' => 'form-control']) !!}
                                        </div>                                            
                                    </div>
                                    @else
                                    @foreach($schedule as $row)
                                    <div class="form-group">
                                        <div class="hr-line-dashed"></div>
                                        <div class="col-md-6">
                                            {!! Form::label('day', 'Dia de la semana *') !!}
                                            {!! Form::select('day_id[]', $days, $row->day_id, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::label('start', 'Hora Inicio *') !!}
                                            {!! Form::time('start[]', $row->start_time, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::label('end', 'Hora fin *') !!}
                                            {!! Form::time('end[]', $row->end_time, ['class' => 'form-control']) !!}
                                        </div>                                            
                                    </div>
                                    @endforeach
                                    @endif
                                    <div id="new_days"></div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group text-right">
                                        <div class="col-lg-12">
                                            <button class="btn btn-primary btn-sm btn-create _load" type="submit" id="btn-main-register">
                                                <i class="fa fa-save"></i> Guardar
                                            </button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="widget style1 lazur-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span>No. Estudiantes</span>
                                <h2 class="font-bold" id="num-register">{{ count($registered) }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content text-center">
                        <div class="m-b-sm">
                            <img alt="image" class="img-circle st-profile" src="{{ url('storage/' . $subject->teacher->photo) }}">
                        </div>
                        <h3>{{ $subject->teacher->name }}</h3>
                        <p class="font-bold">Profesor encargado</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('general.modals')

@endsection

@push('scripts')
{!! Html::script('js/modules/subjects.js') !!}
@endpush