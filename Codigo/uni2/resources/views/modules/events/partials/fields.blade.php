<span>A continuación digite todos los campos del formulario.</span>
<div class="hr-line-dashed"></div>
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-12">
            {!! Form::label('name', 'Titulo *') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-6">
            {!! Form::label('date', 'Fecha *') !!}
            {!! Form::text('date', null, ['class' => 'form-control datepicker', 'required' => true, 'readonly']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::label('state_id', 'Estado *') !!}
            {!! Form::select('state_id', $states, !empty($event->id) ? null : 1 ,['class' => 'form-control', 'required' => true, 'placeholder' => 'Seleccione...']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::label('important', 'Destacado') !!}
            {!! Form::select('important', $important, !empty($event->id) ? null : 'off' ,['class' => 'form-control', 'required' => true, 'placeholder' => 'Seleccione...']) !!}
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
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="fileUpload btn btn-info col-md-12">
                <span> <i class="fa fa-photo"></i> Subir Imagen</span>
                <input type="file" name="image" id="image" class="upload col-md-12" {{ !empty($event->id) ? null : 'required' }}>
            </div>
        </div>
    </div>
</div>