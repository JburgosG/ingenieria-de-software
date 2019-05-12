<?php

namespace App\Http\Controllers;

use App\Events;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request) {
        $event_m = new Events();
        $data = array_filter($request->all());

        $image = $request->file('image');
        $original = $image->getClientOriginalName();
        $ext = $image->getClientOriginalExtension();

        $md5 = md5($original . time());
        $name = 'events/' . $md5 . '.' . strtolower($ext);
        $info = array_merge($data, ['image' => $name]);

        $event_m->fill($info);
        if ($event_m->save()) {
            Storage::put($name, File::get($image));
        }

        $msg = 'created';
        $state = 'success';
        $web = '/events';

        _notification($state, $msg, 'Evento');
        return Redirect::To($web)->withInput();
    }

    public function edit($id) {
        $event = Events::find($id);
        $data = $this->generalData();
        $info = array_merge($data, ['event' => $event]);
        return view('modules.events.edit', $info);
    }

    public function update($id, Request $request) {
        $event_m = Events::find($id);
        $data = array_filter($request->all());
        $image = $request->file('image');

        if (!empty($image)) {
            $original = $image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();

            $md5 = md5($original . time());
            $name = 'events/' . $md5 . '.' . strtolower($ext);
            $img = array('image' => $name);

            Storage::put($name, File::get($image));
        } else {
            $img = array('image' => $event_m->image);
        }

        $info = array_merge($data, $img);

        $event_m->fill($info);
        $event_m->save();

        $msg = 'edit';
        $state = 'success';
        $web = '/events';

        _notification($state, $msg, 'Evento');
        return Redirect::To($web)->withInput();
    }

    public function destroy($id) {
        $event = Events::find($id);
        $path = storage_path('app/');

        File::delete($path . $event->image);
        echo (Events::destroy($id)) ? true : false;
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
