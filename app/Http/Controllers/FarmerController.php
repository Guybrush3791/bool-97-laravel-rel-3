<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Farmer;
use App\Models\Farm;

class FarmerController extends Controller
{

    public function index() {

        $farmers = Farmer :: all();

        return view('pages.farmer.farmer-index', compact('farmers'));
    }

    public function show($id) {

        $farmer = Farmer :: findOrFail($id);
        $farmers = Farmer :: all();

        return view('pages.farmer.farmer-show', compact('farmer', 'farmers'));
    }

    public function create() {

        $farms = Farm :: all();

        return view('pages.farmer.farmer-create', compact('farms'));
    }
    public function store(Request $request) {

        $data = $request -> validate([
            "name" => "required|string|min:3|max:64",
            "lastname" => "required|string|min:3|max:64",
            "dateOfBirth" => "required|date",
            "farms" => "nullable|array",
        ]);

        $farmer = Farmer :: create($data);
        $farmer -> farms() -> attach($data['farms']);

        return redirect() -> route('farmer.show', $farmer -> id);
    }

    public function edit($id) {

        $farmer = Farmer :: findOrFail($id);
        $farms = Farm :: all();

        return view('pages.farmer.farmer-edit', compact('farms', 'farmer'));
    }
    public function update(Request $request, $id) {

        $farmer = Farmer :: findOrFail($id);
        $data = $request -> validate([
            "name" => "required|string|min:3|max:64",
            "lastname" => "required|string|min:3|max:64",
            "dateOfBirth" => "required|date",
            "farms" => "nullable|array",
        ]);

        $farmer -> update($data);
        $farmer -> farms() -> sync($data['farms']);

        return redirect() -> route('farmer.show', $farmer -> id);
    }

    public function delete(Request $request, $id) {

        $farmer = Farmer :: findOrFail($id);
        $data = $request -> all();

        // DELETE ALL CONNECTED RABBITS
        // foreach ($farmer -> rabbits as $rabbit) {
        //     $rabbit -> delete();
        // }

        // MOVE ALL CONNECTED RABBIT TO NEW FARMER
        foreach ($farmer -> rabbits as $rabbit) {
            $rabbit -> farmer_id = $data["farmer_id"];
            $rabbit -> save();
        }
        $farmer -> farms() -> detach();

        $farmer -> delete();

        return redirect() -> route('farmer.index');
    }
}
