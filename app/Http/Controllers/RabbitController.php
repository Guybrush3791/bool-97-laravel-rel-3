<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use App\Mail\NewRabbitMail;

use App\Models\Farmer;
use App\Models\Rabbit;

class RabbitController extends Controller
{

    public function index() {

        $rabbits = Rabbit :: all();

        return view('pages.rabbit.rabbit-index', compact('rabbits'));
    }
    public function show($id) {

        $rabbit = Rabbit :: findOrFail($id);

        return view('pages.rabbit.rabbit-show', compact('rabbit'));
    }

    public function create() {

        $farmers = Farmer :: all();

        return view('pages.rabbit.rabbit-create', compact('farmers'));
    }
    public function store(Request $request) {

        $data = $request -> validate(
            $this -> getValidations(),
            $this -> getValidationMessages()
        );

        if (array_key_exists("main_picture", $data)) {

            $img_path = Storage::put('uploads', $data['main_picture']);
            $data['main_picture'] = $img_path;
        }

        $rabbit = Rabbit :: create($data);

        Mail :: to("admin@mail.com")
            -> send(new NewRabbitMail($rabbit));

        return redirect() -> route('rabbit.show', $rabbit -> id);
    }

    public function edit($id) {

        $rabbit = Rabbit :: findOrFail($id);
        $farmers = Farmer :: all();

        return view('pages.rabbit.rabbit-edit', compact('farmers', 'rabbit'));
    }
    public function update(Request $request, $id) {

        $data = $request -> validate(
            $this -> getValidations(),
            $this -> getValidationMessages()
        );

        $rabbit = Rabbit :: findOrFail($id);

        if (!array_key_exists("main_picture", $data))
            $data['main_picture'] = $rabbit -> main_picture;
        else {
            if ($rabbit -> main_picture) {

                $oldImgPath = $rabbit -> main_picture;
                Storage::delete($oldImgPath);
            }

            $data['main_picture'] = Storage::put('uploads', $data['main_picture']);
        }

        $rabbit -> update($data);

        return redirect() -> route('rabbit.show', $rabbit -> id);
    }

    public function deletePicture($id) {

        $rabbit = Rabbit :: findOrFail($id);

        if ($rabbit -> main_picture) {

            $oldImgPath = $rabbit -> main_picture;
            Storage::delete($oldImgPath);
        }

        $rabbit -> main_picture = null;
        $rabbit -> save();

        return redirect() -> route('rabbit.show', $rabbit -> id);
    }
    public function delete($id) {

        $rabbit = Rabbit :: findOrFail($id);
        $rabbit -> delete();

        return redirect() -> route('rabbit.index');
    }

    private function getValidations() {

        return [
            "name" => "required|string|min:3|max:64",
            "code" => "required|string|min:10|max:10",
            "weight" => "required|integer",
            "farmer_id" => "required|integer",
            "main_picture" => "nullable|file|image|max:2048"
        ];
    }
    private function getValidationMessages() {

        return [
            "code.min" => "Il codice deve essere di 10 caratteri"
        ];
    }
}
