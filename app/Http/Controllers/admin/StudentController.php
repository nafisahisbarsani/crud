<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('grade')->latest()->get();
        return view('admin.student.student_admin', compact('students'), [
            'title' => "Students",
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create', [
            "title" => "Create New Data",
            'grades' => Grade::all(),
            'departments' => Department::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'department_id'  => 'required|exists:departments,id',
            'email'     => 'required',
            'address'      => 'required|string|max:255',
        ]);

        $student = Student::create([
            'name' => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'department_id' => $validated['department_id'],
            'email' => $validated['email'],
            'address' => $validated['address'],
        ]);

        return redirect('/admin/students')->with('success', 'Student updated successfully.');
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
    public function edit($id)
{
    $student = Student::findOrFail($id);
    $grades = Grade::with('department')->get();
    $departments = Department::all();

    return view('admin.student.edit',[
        'title' => 'Edit Student Data',
        'student' => $student,
        'grades' => $grades,
        'departments' => $departments
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'department_id'  => 'required|exists:department,id',
            'email'     => 'required|email|max:255',
            'address'   => 'required|string|max:255',
        ]);

        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Update data siswa
        $student->update([
            'name'     => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'department_id' => $validated['department_id'],
            'email'    => $validated['email'],
            'address'  => $validated['address'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/students')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/admin/students')->with('success', 'Student deleted successfully.');


    }


}
