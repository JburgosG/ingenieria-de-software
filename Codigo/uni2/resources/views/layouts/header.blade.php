@extends('layouts.app')
@section('header')

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle pt-profile img-profile" src="{{ url('storage/' . Auth::user()->photo) }}">
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->name }}</strong>
                            </span>
                            <span class="text-muted text-xs block">
                                {{ Auth::user()->group->name }} <b class="caret"></b>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('profile', encrypt(Auth::user()->id)) }}">Mi perfil</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">Inicio</span>
                </a>
            </li>
            @if(Auth::user()->group->id == 1)
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-label">Administrador</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ url('/users') }}">
                            <i class="fa fa-users"></i>
                            <span class="nav-label">Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/subjects') }}">
                            <i class="fa fa-book"></i>
                            <span class="nav-label">Asignaturas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/events') }}">
                            <i class="fa fa-newspaper-o"></i>
                            <span class="nav-label">Actividades</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->group->id != 1)
            <li>
                <a href="{{ url('/subjects') }}">
                    <i class="fa fa-book"></i>
                    <span class="nav-label">Mis asignaturas</span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{ url('/calendar') }}">
                    <i class="fa fa-calendar"></i>
                    <span class="nav-label">Calendario</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/gallery') }}">
                    <i class="fa fa-picture-o"></i>
                    <span class="nav-label">Galeria</span>
                </a>
            </li>
            @if(!empty(_important()))
            @php $important = _important() @endphp
            <li class="landing_link">
                <a data-toggle="modal" data-target="#viewEvent_{{ $important->id }}" id="event-important">
                    <i class="fa fa-star"></i>
                    <span class="nav-label">Evento Destacado</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>

<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                    <i class="fa fa-bars"></i>
                </a>
                <p class="title-header">Bienvenidos a Uni2</p>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="pull-right">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Salir
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    @yield('content')

    <div class="footer">
        <div class="pull-right">
            <strong>U. Catolica de Colombia</strong>
        </div>
        <div>
            <strong>©</strong> Uni2 - {{ date('Y') }}
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

{{-- Modal Important Event --}}
@if(!empty(_important()))
<div class="modal inmodal" id="viewEvent_{{ $important->id }}" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title">{{ $important->name }}</h4>
                <div class="hr-line-dashed"></div>
                <img src="{{ url('storage/' . $important->image) }}" class="img-responsive img-thumbnail img-event">
            </div>
            <div class="modal-body">
                <p>{{ $important->description }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection