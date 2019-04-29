@extends('layouts.header')
@section('title', 'Usuarios')
@section('content')

    @push('css')
    {!! Html::style('css/plugins/footable/footable.core.css') !!}
    @endpush

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Usuarios</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="active">
                    <strong>Usuarios</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                @if(!empty($users))

                    @include('layouts.partials.errors')
                    @include('layouts.partials.success')

                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <a class="btn btn-info btn-sm btn-create col-lg-12" href="{{ url('create_user') }}">
                                        <i class="fa fa-plus"></i> Nuevo Usuario
                                    </a>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Buscar Usuarios">
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="footable table table-bordered" data-page-size="8" data-filter=#filter>
                                    <thead>
                                    <tr>
                                        <th colspan="2">Nombre</th>
                                        <th>Correo Electrónico</th>
                                        <th>Edad</th>
                                        <th>Perfil</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="gradeA">
                                            <td class="client-avatar">
                                                <img alt="image" src="{{ url('storage/' . $user->photo) }}">
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ _age($user->birthdate) }}</td>
                                            <td>{{ $user->group->name }}</td>
                                            <td>
                                                <a href="{{ url('profile', encrypt($user->id)) }}" class="btn btn-default btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @if($user->id != 1 || $user->id == _user()->id)
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    @if($user->id != _user()->id)
                                                        <a class="btn btn-danger btn-sm _delete" data-url="{{ route('users.destroy', $user->id) }}" data-route="users">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <ul class="pagination pull-left"></ul>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">
                        No existen usuarios en el sistema.
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    {!! Html::script('js/modules/users.js') !!}
    @endpush

@endsection