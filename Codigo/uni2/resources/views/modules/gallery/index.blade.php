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

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            @if(Auth::user()->group->id == 1)
            <a class="btn btn-info mr-gallery col-lg-12" data-toggle="modal" data-target="#uploadGallery">
                <i class="fa fa-upload"> </i> Subir Imagenes
            </a>
            @endif
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    @if(!empty($images) && count($images))
                    <div id="loader-gallery">
                        <div class="spiner-example">
                            <div class="sk-spinner sk-spinner-three-bounce">
                                <div class="sk-bounce1"></div>
                                <div class="sk-bounce2"></div>
                                <div class="sk-bounce3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="lightBoxGallery hide" id="lightBoxGallery">
                        @foreach($images as $row)
                        <a href="{{ url('storage/gallery/' . $row->name . '.' . $row->type) }}" title="Subida el {{ date_spanish_full($row->created_at) }}" data-gallery="">
                            <div class="dialog-gallery" id="image_{{ $row->id }}">
                                <img src="{{ url('storage/gallery/' . $row->name. 's.' . $row->type) }}" class="img-thumbnail">
                                @if(Auth::user()->group->id == 1)
                                <a class="delete-image close-thik-gallery" title="Eliminar Imagen" data-image_id="{{ $row->id }}"></a>
                                @endif
                            </div>
                        </a>
                        @endforeach
                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-warning">
                        <i class="fa fa-warning"></i> No existen imagenes en la galeria.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="uploadGallery" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                {!! Form::open(['method' => 'post', 'route' =>  ['upload-gallery'], 'id' => 'my-awesome-dropzone', 'class' => 'dropzone', 'enctype' => 'multipart/form-data']) !!}
                                <div class="dropzone-previews"></div>
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-save"></i> Cargar imagenes
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{!! Html::script('js/plugins/blueimp/jquery.blueimp-gallery.min.js') !!}
{!! Html::script('js/plugins/dropzone/dropzone.js') !!}
{!! Html::script('js/modules/files.js') !!}
@endpush