<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class Student2Controller extends Controller
{
    public function index()
    {
        $student = Student::where('last_name','Kazi')->where('is_active',true)->get();
            //dd($student);
        return view('welcome',['x'=>$student]);
    }
}
