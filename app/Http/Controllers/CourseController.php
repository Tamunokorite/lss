<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data["courses"] = Course::all();
        return view("courses.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data["departments"] = Department::all();
        return view("courses.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "title" => "required|string|max:255",
            "credits" => "required",
            "level" => "required",
            "hours" => "required",
            "code" => "required|string|max:8"
        ]);

        $course = new Course;
        $course->title = $request->title;
        $course->credits = (int) $request->credits;
        $course->level = (int) $request->level;
        $course->hours = (int) $request->hours;
        $course->code = $request->code;
        $course->department_id = $request->department;
        $course->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
        $data["departments"] = Department::all();
        $data["course"] = $course;
        return view('courses.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "credits" => "required|integer",
            "level" => "required|integer",
            "hours" => "required|integer",
            "code" => "required|string|max:8"
        ]);

        $course->title = $request->title;
        $course->credits = $request->credits;
        $course->level = $request->level;
        $course->hours = $request->hours;
        $course->code = $request->code;
        $course->department_id = $request->department;
        $course->save();

        return redirect()->route("back");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();

        return redirect()->route("back");
    }
}
