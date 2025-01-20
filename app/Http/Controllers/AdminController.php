<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Grade;
use App\Models\Student;

class AdminController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $grades = Grade::with(['students', 'department'])->latest()->get();
        $students = Student::with(['grade', 'department'])->get();

        return view('admin-view', [
            'departments' => $departments,
            'grades' => $grades,
            'students' => $students
        ]);
    }
}
