<?php

namespace App\Http\Controllers;

use App\Events;
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
        $events = Events::where($where)->orderBy('date', 'desc')->limit(5)->get();

        $data = array(
            'events' => $events            
        );

        return view('home', $data);        
    }
}
