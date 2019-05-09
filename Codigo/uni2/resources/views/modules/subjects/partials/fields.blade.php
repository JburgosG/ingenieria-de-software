<span>A continuación digite todos los campos del formulario.</span>
<div class="hr-line-dashed"></div>
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-6">
            {!! Form::label('name', 'Nombre *') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('teacher_id', 'Profesor *') !!}
            {!! Form::select('teacher_id', $teachers, null ,['class' => 'form-control', 'required' => true, 'placeholder' => 'Seleccione...']) !!}
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