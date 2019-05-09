@push('scripts')
{!! Html::style('css/plugins/dropzone/basic.css') !!}
{!! Html::style('css/plugins/dropzone/dropzone.css') !!}
@endpush

<div class="modal inmodal" id="uploadFiles" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                {!! Form::open(['method' => 'post', 'route' =>  ['upload'], 'id' => 'my-awesome-dropzone', 'class' => 'dropzone', 'enctype' => 'multipart/form-data']) !!}
                                {!! Form::hidden('subject_id', encrypt($subject->id)) !!}
                                <div class="dropzone-previews"></div>
                                <button type="submit" class="btn btn-primary pull-right _load">
                                    <i class="fa fa-save"></i> Cargar material
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

<div class="modal inmodal" id="newActivity" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            {!! Form::open(['method' => 'post', 'route' =>  ['activity.store'], 'id' => 'form_add_activity', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
            {!! Form::hidden('subject_id', encrypt($subject->id)) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Nueva Actividad
                </h4>
                <div class="hr-line-dashed"></div>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <span>A continuación digite todos los campos del formulario.</span>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">                            
                                {!! Form::label('name', 'Nombre *') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}                            
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                {!! Form::label('start_date', 'Fecha Inicio *') !!}
                                {!! Form::text('start_date', null, ['class' => 'form-control datepicker', 'required' => true, 'readonly']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('end_date', 'Fecha Cierre *') !!}
                                {!! Form::text('end_date', null, ['class' => 'form-control datepicker', 'required' => true, 'readonly']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('start_hour', 'Hora Inicio *') !!}
                                {!! Form::time('start_hour', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::label('end_hour', 'Hora fin *') !!}
                                {!! Form::time('end_hour', null, ['class' => 'form-control']) !!}
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                {!! Form::label('description', 'Descripción *') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => true, 'rows' => 5]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm btn-create _load" type="submit">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@push('scripts')
{!! Html::script('js/plugins/dropzone/dropzone.js') !!}
{!! Html::script('js/modules/files.js') !!}
@endpush