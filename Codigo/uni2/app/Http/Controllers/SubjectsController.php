<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Student_Subject;
use Illuminate\Http\Request;

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
}