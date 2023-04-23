<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data["buildings"] = Building::all();
        return view("rooms.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "number" => "required|string|max:8",
            "building" => "required"
        ]);

        $room = new Room;
        $room->number = $request->number;
        $room->building_id = $request->building;
        $room->save();


        return redirect()->route("buildings.show", ['building' => $request->building]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
        $data["buildings"] = Building::all();
        $data["room"] = $room;
        return view('rooms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
        $validated = $request->validate([
            "number" => "required|string|max:8",
            "building" => "required"
        ]);

        $room->number = $request->number;
        $room->building_id = $request->building;
        $room->save();

        return redirect()->route("buildings.show", ['building' => $request->building]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
        $building = $room->building_id;
        $room->delete();

        return redirect()->route("buildings.show", ['building' => $building]);
    }
}
