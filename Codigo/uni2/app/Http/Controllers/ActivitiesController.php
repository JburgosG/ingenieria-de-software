<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ActivitiesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        if (_user()->group->id == 3) {
            $activity_m = new Activity();
            $data = array_filter($request->all());
            $id = $data['subject_id'];
            $subject = decrypt($id);
            $data['subject_id'] = $subject;
            $activity_m->fill($data);
            $activity_m->save();

            $msg = 'created';
            $state = 'success';
            $web = '/view_subject/' . $id;

            _notification($state, $msg, 'Actividad');
            return Redirect::To($web)->withInput();
        }
        return redirect('/');
    }
}