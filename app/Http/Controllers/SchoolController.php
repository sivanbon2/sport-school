<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Course;

class SchoolController extends Controller
{
    public function __construct(){
        $this->middleware( 'auth' );
    }

    public function index() {
        $students = Student::all();
        $courses = Course::all();
        $role = auth()->user()->role->name;
        return view('school.index', compact( 'courses' ,'students', 'role' ));
    }
}
