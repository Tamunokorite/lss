<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data["lecturers"] = Lecturer::orderBy("id", "asc")->paginate(10);
        return view("lecturers.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data["departments"] = Department::all();
        return view("lecturers.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name" => "required|string|max:255",
            "department" => "required"
        ]);

        $lecturer = new Lecturer;
        $lecturer->name = $request->name;
        $lecturer->department_id = $request->department;
        $lecturer->save();


        return redirect()->route("departments.show", ["department" => $request->department]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        //
        $data["departments"] = Department::all();
        $data["lecturer"] = $lecturer;
        return view('lecturers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
        $validated = $request->validate([
            "name" => "required|string|max:150",
            "department" => "required"
        ]);

        $lecturer->name = $request->name;
        $lecturer->department_id = $request->department;
        $lecturer->save();

        return redirect()->route("departments.show", ["department" => $request->department]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        //
        $department = $lecturer->department_id;
        $lecturer->delete();

        return redirect()->route("departments.show", ["department" => $department]);
    }
}
