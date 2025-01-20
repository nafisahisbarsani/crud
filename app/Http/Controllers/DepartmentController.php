<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with(['students', 'grades'])->latest()->get();
        return view('department', [
                'title' => 'Department',
                'departments' => $departments
            ]);
    }
}
