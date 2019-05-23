<?php

namespace App\Http\Controllers;

use App\Events;
use App\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $where = ['state_id' => 1];
        $gallery = Gallery::orderBy('created_at', 'desc')->limit(5)->get();
        $events = Events::where($where)->orderBy('date', 'desc')->limit(5)->get();

        $data = array(
            'events' => $events,
            'gallery' => $gallery
        );

        return view('home', $data);        
    }
}
