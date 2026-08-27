<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('students.form');
    }

    public function store(Request $request)
    {
        return back();
    }
}