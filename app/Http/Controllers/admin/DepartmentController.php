<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with(['students', 'grades'])->latest()->get();
        return view('admin.department.department_admin', [
                'title' => 'Department',
                'departments' => $departments
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create', [
            "title" => "Create New Data",
            'department' => Department::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'department'      => 'required|string|max:100',
            'description'      => 'required|string|max:255',
        ]);

        $department = Department::create([
            'name' => $validated['department'],
            'description' => $validated['description'],
        ]);

          // Redirect atau response sukses
          return redirect('/admin/department')->with('success', 'Department created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view('admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'department' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $department = Department::findOrFail($id);

        $department->update([
            'name' => $request->input('department'),
            'description' => $request->input('description'),
        ]);

        return redirect('/admin/department')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect('/admin/department')->with('success', 'Student deleted successfully.');
    }
}
