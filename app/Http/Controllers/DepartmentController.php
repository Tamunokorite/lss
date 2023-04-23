<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lecturer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        $data["departments"] = Department::all();
        return view("departments.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("departments.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name" => "required|string|max:150",
            "faculty" => "required|string|max:8"
        ]);

        $department = new Department;
        $department->name = $request->name;
        $department->faculty = $request->faculty;
        $department->save();

        return redirect()->route("departments.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
        $data['department'] = $department;
        return view('departments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //

        return view('departments.edit', [
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //

        $request->validate([
            "name" => "required|string|max:150",
            "faculty" => "required|string|max:8"
        ]);

        $department->update($validated);

        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
        $department->delete();

        return redirect(route('departments.index'));
    }

    public function backToPreviousURL(){
        return Redirect::to(url()->previous());
    }
}
