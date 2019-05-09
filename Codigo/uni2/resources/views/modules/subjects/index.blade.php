@extends('layouts.header')
@section('title', $title)
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ $title }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li class="active">
                <strong>{{ $title }}</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            @include('layouts.partials.errors')
            @include('layouts.partials.success')

            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="form-group row">
                        @if(_user()->group->id == 1)
                        <div class="col-lg-2">
                            <a class="btn btn-info btn-sm btn-create col-lg-12" href="{{ url('create_subject') }}">
                                <i class="fa fa-plus"></i> Nueva Asignatura
                            </a>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Buscar Asignaturas">
                        </div>
                        @else
                        <div class="col-lg-12">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Buscar Asignaturas">
                        </div>
                        @endif
                    </div>
                    <hr>
                    <div class="table-responsive">
                        @if(!empty(count($subjects)))
                        <table class="footable table table-bordered" data-page-size="8" data-filter=#filter>
                            <thead>
                                <tr>
                                    <th width="5%">Código</th>
                                    <th width="15%">{{ trans('users.datatable_name') }}</th>
                                    <th>Descripción</th>
                                    <th width="15%">Profesor</th>
                                    <th width="{{ _user()->group->id == 1 ? '15%' : '5%' }}" class="text-center">{{ trans('users.datatable_actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $row)
                                <tr class="gradeA">
                                    <td>{{ $row->id }}</td>
                                    <td>
                                        <a href="{{ url('view_subject', encrypt($row->id)) }}">
                                            {{ $row->name }}
                                        </a>
                                    </td>
                                    <td class="text-justify">{{ $row->description }}</td>
                                    <td>{{ $row->teacher->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('view_subject', encrypt($row->id)) }}" class="btn btn-default btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if(_user()->group->id == 1)
                                        <a href="{{ route('subject.edit', $row->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm _delete" data-url="{{ route('subject.destroy', $row->id) }}" data-route="subjects">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-left"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        @else
                        <div class="alert alert-warning">
                            <i class="fa fa-warning"></i> No existen asignaturas en el sistema.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection