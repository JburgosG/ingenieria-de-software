{!! Form::open(['method' => 'post', 'route' =>  ['register'], 'id' => 'form_add_students', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
{!! Form::hidden('subject_id', encrypt($subject->id)) !!}
<div class="form-group row">
    <div class="col-lg-10">
        {!! Form::select('students[]', $students, null ,['class' => 'form-control', 'required' => true, 'multiple', 'id' => 'select-register']) !!}
    </div>
    <div class="col-lg-2">
        <button class="btn btn-success btn-sm btn-create col-lg-12" type="submit" id="btn-main-register">
            <i class="fa fa-plus"></i> Matricular
        </button>
        <button class="btn btn-success btn-sm btn-create col-lg-12 hide" type="submit" id="btn-second-register" disabled>
            <i class="fa fa-spinner fa-pulse"></i> Matricular
        </button>
    </div>
</div>
{!! Form::close() !!}
<div class="hr-line-dashed"></div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tbody>
        @forelse($registered as $row)
            <tr>
                <td class="client-avatar">
                    <img alt="image" src="{{ url('storage/' . $row->student->photo) }}">
                </td>
                <td>                    
                    <a href="{{ url('profile', encrypt($row->student->id)) }}" class="client-link">
                        {{ $row->student->name }}
                    </a>
                </td>
                <td class="contact-type"><i class="fa fa-envelope"></i></td>
                <td>{{ $row->student->email }}</td>
                <td class="client-status">
                    <a href="{{ url('profile', encrypt($row->student->id)) }}" class="label label-info pointer">
                        <i class="fa fa-check"></i> Ver estudiante
                    </a>
                </td>
                <td class="client-status">
                    <span class="label label-danger pointer _delete" data-url="{{ url('unregistration', [$row->student->id, encrypt($subject->id)]) }}" data-route="/view_subject/{{ encrypt($subject->id) }}" data-method="get">
                        <i class="fa fa-times"></i> Desmatricular
                    </span>
                </td>
            </tr>
        @empty
            <div class="alert alert-warning">
                <i class="fa fa-warning"></i> No hay usuarios matriculados en esta asignatura.
            </div>
        @endforelse
        </tbody>
    </table>
</div>

@push('scripts')
    {!! Html::script('js/modules/subjects.js') !!}
@endpush