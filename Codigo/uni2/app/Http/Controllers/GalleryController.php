<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::orderBy('created_at', 'desc')->get();
        return view('modules.gallery.index', compact('images'));
    }

    public function upload(Request $request)
    {
        $data = array_filter($request->all());

        if(!empty($data['file'])){
            $files = $request->file('file');
            foreach ($files as $file){
                $gallery = new Gallery();
                $original = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();

                $md5 = md5($original . time());
                $name = $md5 . '.' . strtolower($ext);

                $info = [
                    'name' => $md5,
                    'type' => strtolower($ext)
                ];

                $gallery->fill($info);
                if($gallery->save()){
                    $path_s = storage_path('app/gallery/' . $md5 . 's.' . strtolower($ext));
                    $path_g = storage_path('app/gallery/' . $md5 . 'g.' . strtolower($ext));
                    Image::make(File::get($file))->resize(100, 100)->save($path_s);
                    Image::make(File::get($file))->resize(400, 300)->save($path_g);
                    Storage::put('gallery/' . $name,  File::get($file));
                }
            }
        }
    }
}