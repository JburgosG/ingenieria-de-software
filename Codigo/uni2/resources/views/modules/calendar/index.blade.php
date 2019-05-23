@extends('layouts.header')
@section('title', 'Calendario')
@section('content')

@push('css')
{!! Html::style('css/plugins/iCheck/custom.css') !!}
{!! Html::style('css/plugins/fullcalendar/fullcalendar.css') !!}
@endpush

<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">        
        <div class="col-lg-12">
            <div class="ibox float-e-margins">                
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
{!! Html::script('js/plugins/fullcalendar/moment.min.js') !!}
{!! Html::script('js/jquery-ui.custom.min.js') !!}
{!! Html::script('js/plugins/iCheck/icheck.min.js') !!}
{!! Html::script('js/plugins/fullcalendar/fullcalendar.min.js') !!}
{!! Html::script('js/plugins/fullcalendar/locale-all.js') !!}
{!! Html::script('js/modules/calendar.js') !!}
@endpush

@endsection