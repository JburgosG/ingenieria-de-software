@extends('layouts.header')
@section('title', 'Ver Usuario')
@section('content')

<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-2 text-center">
            <div class="ibox float-e-margins">
                <div class="ibox-content no-padding border-left-right">
                    <img alt="image" class="img-responsive img-profile" src="{{ url('storage/' . $user->photo) }}">
                </div>
            </div>
            @if($user->id == _user()->id)
            {!! Form::open(['method' => 'post', 'route' =>  ['change-avatar'], 'id' => 'avatar-form', 'enctype' => 'multipart/form-data']) !!}
            <div class="col-lg-12">
                <div class="fileUpload btn btn-default">
                    <span id="label-file">
                        <i class="fa fa-photo"></i> Actualizar
                    </span>
                    <input type="file" name="image" id="image" class="upload" accept=".png, .jpg, .jpeg">
                </div>
            </div>
            {!! Form::close() !!}
            @endif
        </div>
        <div class="col-md-10">            
            @if($user->group->id == 3 && !empty($user->teacher->biography))
            <div class="alert alert-info text-justify">
                <b>Biografia:</b> {{ $user->teacher->biography }}
            </div>
            @endif
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="panel-body">                        
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default active">
                                <div class="panel-heading pointer" id="in-panel" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                                    <h5 class="panel-title">
                                        <a class="collapsed">
                                            <i class="fa fa-plus"></i> Datos Basicos
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td><label for="Nombre">Nombre:</label></td>
                                                    <td>{{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="Rol">Rol:</label></td>
                                                    <td>
                                                        <strong class="font-bold">{{ $user->group->name }}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label for="Genero">Genero:</label></td>
                                                    <td>{{ $user->gender == 'm' ? 'Masculino' : 'Femenino' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="Nacimiento">Nacimiento:</label></td>
                                                    <td>{{ date_spanish_full_short($user->birthdate) }}</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="address">Dirección:</label></td>
                                                    <td>{{ $user->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="phone">Teléfono:</label></td>
                                                    <td>{{ $user->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="identification_type">Tipo de identificación:</label></td>
                                                    <td>{{ $user->identification_type->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="Identificación">Identificación:</label></td>
                                                    <td>{{ number_format($user->identification) }}</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="email">Email:</label></td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                @if($user->group_id == 2)
                                                <tr>
                                                    <td><label for="email">Eps:</label></td>
                                                    <td>{{ $user->student->eps }}</td>
                                                </tr>
                                                <tr>
                                                    <td><label for="email">Tipo de estudiante:</label></td>
                                                    <td>{{ $user->student->type->name }}</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>                            
                            @if($user->id == _user()->id || _user()->group->id == 1)
                                @if($user->id != 1)
                                <div class="panel panel-default">
                                    <div class="panel-heading pointer" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" aria-expanded="false">
                                                <i class="fa fa-plus"></i> Cambiar Contraseña
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="col-lg-12">
                                                <div class="msg_alert alert alert-success" id="msg-change">
                                                    <i class="fa fa-check"></i> Cambio de contraseña realizado exitosamente.
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                {!! Form::open(['method' => 'post', 'route' =>  ['change-pass'], 'id' => 'form-change-pass']) !!}
                                                {{ Form::hidden('user_id', $user->id) }}
                                                <div class="form-group">
                                                    <label>Nueva Contraseña</label>
                                                    <input type="password" class="form-control" name="password" id="password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Repetir Contraseña</label>
                                                    <input type="password" class="form-control" name="password_again">
                                                </div>
                                                <div>
                                                    <button class="btn btn-sm btn-primary" type="submit" id="btn-change">
                                                        <strong>Establecer</strong>
                                                    </button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
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