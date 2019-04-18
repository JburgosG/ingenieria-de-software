<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MainController extends Controller
{
    public function loadimage($folder, $img) {
        $path = storage_path('app/' . $folder . '/' . $img);
        return Image::make($path)->response();
    }
}