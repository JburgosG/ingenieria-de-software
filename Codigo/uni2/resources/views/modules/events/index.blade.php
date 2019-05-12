@extends('layouts.header')
@section('title', 'Actividades')
@section('content')

@push('css')
{!! Html::style('css/plugins/footable/footable.core.css') !!}
@endpush

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Actividades</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li class="active">
                <strong>Actividades</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">                
                <div class="ibox-content">
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <a class="btn btn-info btn-sm btn-create col-lg-12" href="{{ url('create_event') }}">
                                <i class="fa fa-plus"></i> Nuevo Actividad
                            </a>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Buscar">
                        </div>
                    </div>
                    <hr>
                    @if(!empty($events) && count($events))
                    <div class="table-responsive">
                        <table class="footable table table-bordered" data-page-size="8" data-filter=#filter>
                            <thead>
                                <tr>
                                    <th>{{ trans('users.datatable_name') }}</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>                                    
                                    <th width="10%">Estado</th>
                                    <th width="13%">{{ trans('users.datatable_actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $row)
                                    <tr class="gradeA">
                                        <td>{!!  $row->important == 'on' ? '<i class="fa fa-star"></i>' : null !!} {{ $row->name }}</td>
                                        <td>{{ date_spanish_full_short($row->date) }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td class="text-center">
                                            <label class="label label-{{ $row->state_id == 2 ? 'warning' : 'primary' }}">
                                                {{ $row->state->name }}
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            @include('modules.events.partials.view')
                                            <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#viewEvent_{{ $row->id }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if(_user()->id == 1)
                                                <a href="{{ route('event.edit', $row->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm _delete" data-url="{{ route('event.destroy', $row->id) }}" data-route="events">
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
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @else
                        <div class="alert alert-warning">
                            <i class="fa fa-warning"></i> No existen actividades en el sistema.
                        </div>
                    @endif
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