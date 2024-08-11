<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Student;
use App\Models\Batch;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $enrollments=Enrollment::all();
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $students=Student::pluck('name','id');
        $batches=Batch::pluck('name','id');
        return view('enrollments.create', compact('students','batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input=$request->all();
        Enrollment::create($input);
        return redirect()->route('enrollments.index')->with('flash_message','Enrollment Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $enrollment=Enrollment::find($id);
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $enrollment=Enrollment::findOrFail($id);

        if(!$enrollment){
            abort(404,'Enrollment not found');
        }
        $students=Student::pluck('name','id');
        $batches=Batch::pluck('name','id');
        return view('enrollments.edit', compact('enrollment','students','batches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $enrollment=Enrollment::findOrFail($id);
        $input=$request->all();
        $enrollment->update($input);
        return redirect()->route('enrollments.index')->with('success','Enrollment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
       Enrollment::destroy($id);
       return redirect()->route('enrollments.index')->with('success','Enrollment Delete Successfully');
    }
}
