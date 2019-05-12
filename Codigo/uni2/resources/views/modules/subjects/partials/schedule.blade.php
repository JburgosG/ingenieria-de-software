<div class="form-group" id="day_{{ $num }}">
    <div class="hr-line-dashed"></div>
    <div class="col-md-6">
        {!! Form::label('day', 'Dia de la semana *') !!}
        {!! Form::select('day_id[]', $days, null ,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('start', 'Hora Inicio *') !!}
        {!! Form::time('start[]', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('end', 'Hora fin *') !!}
        {!! Form::time('end[]', null, ['class' => 'form-control']) !!}
    </div>
</div>