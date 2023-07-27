<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function getForm() {

        return view('pages.test.form');
    }
    public function readForm(Request $request) {

        $data = $request -> all();
        $img_path = Storage::disk('public')->put('uploads', $data['image']);
        dd($img_path);
    }
}
