<?php

namespace App\Http\Controllers;

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
}
