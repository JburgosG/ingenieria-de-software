<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MainController extends Controller
{
    public function loadimage($folder, $img) {
        $path = storage_path('app/' . $folder . '/' . $img);
        return Image::make($path)->response();
    }

     public function exists(Request $request) {
        $ok = true;
        $data = $request->input();
        $field = $data['field'];
        $val = array_values($data)[0];
        $query = \DB::table($data['table'])->where($data['field'], $val)->count();
        if (filter_var($data['exists'], FILTER_VALIDATE_BOOLEAN)) {
            if (empty($query) && !empty($val)) {
                $ok = false;
            }
        } else {
            if (!empty($query)) {
                $ok = false;
            }
        }
        echo json_encode($ok);
    }

    public function getEvents() {

        $data = array();
        $events = Events::all();
        if (!empty($events)) {
            foreach ($events as $val) {
                $data[] = [
                    'title' => $val->name,
                    'start' => $val->date,
                ];
            }
        }

        return json_encode($data);
    }
}