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
    <div class="form-group">
        <div class="col-md-12">
            <div class="col-md-6">
                {!! Form::label('eps', 'EPS *') !!}
                {!! Form::text('eps', (!empty($user) && $user->group->id == 2) ? $user->student->eps : null, ['class' => 'form-control', 'required' => true]) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('level_education_id', 'Nivel de educación *') !!}
                {!! Form::select('level_education_id', $level_edu, (!empty($user) && $user->group->id == 2) ? $user->student->level_education->id : null,['class' => 'form-control', 'required' => true, 'placeholder' => 'Seleccione...']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="col-md-6">
                {!! Form::label('type_id', 'Tipo de Estudiante *') !!}
                {!! Form::select('type_id', $student_type, (!empty($user) && $user->group->id == 2) ? $user->student->type_id : null,['class' => 'form-control', 'required' => true, 'placeholder' => 'Seleccione...']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="hr-line-dashed"></div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-money" aria-hidden="true"></i> Información de pago
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            {!! Form::label('payment_day', 'Dia del mes') !!}
                            {!! Form::number('payment_day', null, ['class' => 'form-control', 'min' => 1, 'max' => 30]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('price', 'Valor') !!}
                            {!! Form::number('price', null, ['class' => 'form-control', 'min' => 0]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-male" aria-hidden="true"></i> Datos del acudiente
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            {!! Form::label('name_a', 'Nombre') !!}
                            {!! Form::text('name_a', (!empty($user) && $user->group->id == 2) ? $user->student->attendant->name : null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('email_a', 'Correo Electrónico') !!}
                            {!! Form::text('email_a', (!empty($user) && $user->group->id == 2) ? $user->student->attendant->email : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            {!! Form::label('identification_type_a', 'Tipo identificación') !!}
                            {!! Form::select('identification_type_a', $iden_type, (!empty($user) && $user->group->id == 2) ? $user->student->attendant->identification_type->id : 2 ,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('identification_a', 'No. identificación') !!}
                            {!! Form::text('identification_a', (!empty($user) && $user->group->id == 2) ? $user->student->attendant->identification : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            {!! Form::label('address_a', 'Dirección') !!}
                            {!! Form::text('address_a', (!empty($user) && $user->group->id == 2) ? $user->student->attendant->address : null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('home_phone', 'Teléfono Fijo') !!}
                            {!! Form::number('home_phone', (!empty($user) && $user->group->id == 2) ? $user->student->attendant->home_phone : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            {!! Form::label('office_phone', 'Teléfono Oficina') !!}
                            {!! Form::number('office_phone', (!empty($user) && $user->group->id == 2) ? $user->student->attendant->office_phone : null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('cell_phone', 'Celular') !!}
                            {!! Form::number('cell_phone', (!empty($user) && $user->group->id == 2) ? $user->student->attendant->cell_phone : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            {!! Form::label('relationship_id', 'Parentesco') !!}
                            {!! Form::select('relationship_id', $relarions, (!empty($user) && $user->group->id == 2) ? $user->student->attendant->relationship->id : 1 ,['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
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