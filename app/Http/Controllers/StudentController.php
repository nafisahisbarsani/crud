<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('grade')->latest()->get();
        return view('student', [
            'title' => 'Student ',
            'students' => Student::all()
        ]);

    }

}
