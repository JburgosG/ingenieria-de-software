<span>A continuación podra modificar todos los campos del formulario.</span>
<div class="hr-line-dashed"></div>
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-6">
            {!! Form::label('name', 'Nombre Completo *') !!}
            {!! Form::text('name', (!empty($user)) ?  $user->name : null, ['class' => 'form-control', 'required' => true]) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('gender', 'Genero *') !!}
            {!! Form::select('gender', $gender, (!empty($user)) ?  $user->gender : null ,['class' => 'form-control', 'required' => true, 'placeholder' => 'Seleccione...']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-6">
            {!! Form::label('email', 'Correo Electrónico *') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('birthdate', 'Fecha de nacimiento *') !!}
            {!! Form::text('birthdate', null, ['class' => 'form-control datepicker', 'required' => true, 'readonly']) !!}
        </div>
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-6">
            {!! Form::label('address', 'Dirección *') !!}
            {!! Form::text('address', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('phone', 'Teléfono *') !!}
            {!! Form::number('phone', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-6">
            {!! Form::label('identification_type_id', 'Tipo identificación *') !!}
            {!! Form::select('identification_type_id', $iden_type, null , ['class' => 'form-control', 'required' => true, 'placeholder' => 'Seleccione...']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('identification', 'No. identificación *') !!}
            {!! Form::text('identification', null, ['class' => 'form-control', 'required' => true]) !!}
        </div>
    </div>
</div>
@if(empty($user))
<div class="form-group">
    <div class="col-md-12">
        <div class="col-md-6">
            {!! Form::label('password', 'Contraseña *') !!}
            {!! Form::password('password', ['class' => 'form-control', 'required' => true]) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('password_again', 'Repetir Contraseña *') !!}
            {!! Form::password('password_again', ['class' => 'form-control', 'required' => true]) !!}
        </div>
    </div>
</div>
@endif

{{-- Form Student --}}
<div id="student" class="fields {{ (!empty($user) && $user->group->id == 2) ? null : 'hide' }}">
    <div class="hr-line-dashed"></div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="col-md-6">
                {!! Form::label('eps', 'EPS *') !!}
                {!! Form::text('eps', (!empty($user) && $user->group->id == 2) ? $user->student->eps : null, ['class' => 'form-control', 'required' => true]) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('type_id', 'Tipo de Estudiante *') !!}
                {!! Form::select('type_id', $student_type, (!empty($user) && $user->group->id == 2) ? $user->student->type_id : null,['class' => 'form-control', 'required' => true, 'placeholder' => 'Seleccione...']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="hr-line-dashed"></div>
    </div>
</div>

{{-- Form Teacher --}}
<div id="teacher" class="fields {{ (!empty($user) && $user->group->id == 3) ? null : 'hide' }}">
    <div class="hr-line-dashed"></div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="col-md-6">
                {!! Form::label('specialty', 'Especialidad') !!}
                {!! Form::text('specialty', (!empty($user) && $user->group->id == 3) ? $user->teacher->specialty : null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('level_education_teacher', 'Nivel de educación') !!}
                {!! Form::select('level_education_teacher', $level_edu, (!empty($user) && $user->group->id == 3) ? $user->teacher->level_education->id : null,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="col-md-12">
                {!! Form::label('biography', 'Biografía') !!}
                {!! Form::textarea('biography', (!empty($user) && $user->group->id == 3) ? $user->teacher->biography : null, ['rows' => 4, 'class' => 'form-control', 'required' => true]) !!}
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="hr-line-dashed"></div>
</div>