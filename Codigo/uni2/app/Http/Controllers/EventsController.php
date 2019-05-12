<?php

namespace App\Http\Controllers;

use App\State;
use App\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index() {
        if (_user()->group->id == 1) {
            $events = Events::orderBy('date', 'desc')->get();
            $data = ['events' => $events];
            return view('modules.events.index', $data);
        }
        return redirect('/');
    }

    /* --------------------------------------------------------------------- */

    public function create() {
        if (_user()->group->id == 1) {
            $data = $this->generalData();
            return view('modules.events.create', $data);
        }
        return redirect('/');
    }

    /* --------------------------------------------------------------------- */

    public function generalData() {
        $important = ['on' => 'Si', 'off' => 'No'];
        $states = State::pluck('name', 'id');

        return [
            'states' => $states,
            'important' => $important
        ];
    }
}
