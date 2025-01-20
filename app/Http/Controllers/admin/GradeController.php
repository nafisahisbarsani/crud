<?php

namespace App\Http\Controllers\admin;
use App\Models\Grade;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.grade.grade_admin', [
        //     'title' => 'Grade',
        //     'grades' => Grade::with(['students', 'department'])->latest()->get(),
        // ]);
        $grades = Grade::with(['students', 'department'])->latest()->get();
        return view('admin.grade.grade_admin', compact('grades'),[
            'title' => "Grade",
             'grades' => $grades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $grades = Grade::all();
        // return view('admin.grade.create', compact('grades'));
        return view('admin.grade.create',[
            "title" => "Create New Data",
            'grades' =>  Grade::all(),
            'department' => Department::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'grade' => 'required|string|max:100|unique:grades,grade',
            //'department_id' => 'required|exists:departments,id',
            // 'grade_id'  => 'required|exists:grades,id',
            // 'department_id'  => 'required|exists:departments,id',
        ]);
        Grade::create([
            'grade' => $validated['grade'],
            'department_id' => 1
            //'department_id' => $request->department_id,

        ]);
        return redirect('/admin/grade')->with('success', 'Grade added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade = Grade::findOrFail($id);
        $grades = Grade::all();
        return view('admin.grade.edit', compact('grade', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    $validated = $request->validate([
        'grade' => 'required|string|max:255|unique:grades,grade,' . $id,
    ]);

    $grade = Grade::findOrFail($id);


    $grade->update([
        'grade' => $validated['grade'],
    ]);


    return redirect('/admin/grade')->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);  // Find the grade by ID
        $grade->delete();  // Delete the grade

        // Redirect to the grade list page with a success message
        return redirect('/admin/grade')->with('success', 'Grade deleted successfully');
    }

    

}
