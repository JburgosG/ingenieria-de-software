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
                            <i class="fa fa-star"></i> Bienvenidos a la Fundación Vida y Arte
                        </span> - transformando realidades a través del arte...
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="carousel slide" id="carousel1">
                        <div class="carousel-inner">
                            
                        </div>
                        <a data-slide="prev" href="#carousel1" class="left carousel-control">
                            <span class="icon-prev"></span>
                        </a>
                        <a data-slide="next" href="#carousel1" class="right carousel-control">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Últimos eventos</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::user()->group->id != 1)        
        <div class="col-lg-7">
            <div class="ibox float-e-margins">
                
            </div>
        </div>
        @else
        <div class="col-lg-7">
            Falta definir Interfaz de administrador...
        </div>
        @endif
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#event-important').click();
    });
</script>
@endpush