<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data["buildings"] = Building::all();
        return view("buildings.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("buildings.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name" => "required|string|max:150",
            "letter" => "required|string|max:1"
        ]);

        $building = new Building;
        $building->name = $request->name;
        $building->letter = $request->letter;
        $building->save();

        return redirect()->route("buildings.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        //
        $data['building'] = $building;
        return view('buildings.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        //
        return view('buildings.edit', [
            'building' => $building,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Building $building)
    {
        //
        $request->validate([
            "name" => "required|string|max:150",
            "letter" => "required|string|max:1"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        //
        $building->delete();

        return redirect(route('buildings.index'));
    }

    public function backToPreviousURL(){
        return Redirect::to(url()->previous());
    }
}
