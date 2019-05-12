@extends('layouts.header')
@section('title', 'Inicio')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
    	<div class="row">
	        <div class="col-lg-12">
	            <div class="ibox float-e-margins">
	                <div class="ibox-content text-center p-md">
	                    <h2>
	                        <span class="text-navy">
	                            <i class="fa fa-star"></i> Bienvenidos a la Universidad Católica de Colombia
	                        </span> - UNI2
	                    </h2>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-5">
	        	<div class="ibox float-e-margins">
	                <div class="ibox-title">
	                    <h5>Últimos eventos</h5>
	                    <div class="ibox-tools">
	                        <a class="collapse-link">
	                            <i class="fa fa-chevron-up"></i>
	                        </a>
	                    </div>
	                </div>
	                <div class="ibox-content">
	                    @if(!empty($events) && count($events))
	                    <table class="table table-bordered">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Nombre</th>
	                                <th>Fecha</th>
	                                <th>Visualizar</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            @foreach($events as $row)
	                            <tr>
	                                <td>{{ $row->id }}</td>
	                                <td>{{ $row->name }}</td>
	                                <td>{{ date_spanish_full_short($row->date) }}</td>
	                                <td class="text-center">
	                                    @include('modules.events.partials.view')
	                                    <label class="label label-info pointer" data-toggle="modal" data-target="#viewEvent_{{ $row->id }}">
	                                        <i class="fa fa-eye"></i> Ver
	                                    </label>
	                                </td>
	                            </tr>
	                            @endforeach
	                        </tbody>
	                    </table>
	                    @else
	                    <div class="alert alert-warning">
	                        <i class="fa fa-warning"></i> No existen eventos en el sistema.
	                    </div>
	                    @endif
	                </div>
            	</div>
	        </div>
	    </div>
    </div>

@endsection