<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('welcome',['students' => $students]);
    }

    public function create() {
        return view('students.create');
    }
}
