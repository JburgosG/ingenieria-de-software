<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use App\Student_Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubjectsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
		$user_id = _user()->id;
        $group = _user()->group->id;

        if ($group == 1) {
            $title = 'Asignaturas';
            $subject = Subject::all();
        } elseif ($group == 3) {
            $title = 'Mis asignaturas';
            $where = ['teacher_id' => $user_id];
            $subject = Subject::where($where)->get();
        } else {
            $title = 'Mis asignaturas';
            $where = ['student_id' => $user_id];
            $student_subject = Student_Subject::where($where)->pluck('subject_id');
            $subject = Subject::whereIn('id', $student_subject)->get();
        }

        $data = [
            'title' => $title,
            'subjects' => $subject
        ];

        return view('modules.subjects.index', $data);
	}

	/* --------------------------------------------------------------------- */

	public function create() {
        if (_user()->group->id == 1) {
            $data = $this->general_data();
            return view('modules.subjects.create', $data);
        }
        return redirect('/');
    }

    public function store(Request $request) {
        $subject_m = new Subject();
        $data = array_filter($request->all());
        $subject = $this->prepareData($data);
        $subject_m->fill($subject);

        if ($subject_m->save()) {
            $this->generate_slug($subject_m->id, $data);
        }

        $msg = 'created';
        $state = 'success';
        $web = '/subjects';

        _notification($state, $msg, 'Asignatura');
        return Redirect::To($web)->withInput();
    }

    public function general_data() {
        return array(
            'teachers' => User::where('group_id', 3)->pluck('name', 'id')
        );
    }

    public function prepareData($data) {
        $c_desc = str_replace('  ', ' ', $data['description']);
        $desc = ucfirst(mb_strtolower($c_desc, 'UTF-8'));

        $complete = str_replace('  ', ' ', $data['name']);
        $name = ucwords(mb_strtolower($complete, 'UTF-8'));

        return array(
            'name' => trim($name),
            'description' => trim($desc),
            'teacher_id' => $data['teacher_id']
        );
    }

    public function generate_slug($id, $data) {
        $sub = Subject::find($id);
        $name = substr($data['name'], 0, 100);
        $data['slug'] = slug($name . '-' . $id);
        $sub->fill($data);
        $sub->save();
    }
}