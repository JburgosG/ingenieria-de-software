@extends('layouts.header')
@section('title', 'Galeria')
@section('content')

@push('css')
{!! Html::style('css/plugins/dropzone/basic.css') !!}
{!! Html::style('css/plugins/dropzone/dropzone.css') !!}
{!! Html::style('css/plugins/blueimp/css/blueimp-gallery.min.css') !!}
@endpush

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Galeria de fotos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li class="active">
                <strong>Galeria de fotos</strong>
            </li>
        </ol>
    </div>
</div>

@endsection

@push('scripts')
{!! Html::script('js/plugins/blueimp/jquery.blueimp-gallery.min.js') !!}
{!! Html::script('js/plugins/dropzone/dropzone.js') !!}
{!! Html::script('js/modules/files.js') !!}
@endpush