<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {        
        $users = User::all();
        $data = ['users' => $users];
        return view('modules.users.index', $data);        
    }
}
