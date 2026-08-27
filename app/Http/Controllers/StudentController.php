<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('students.form');
    }

    public function index(Request $request)
    {
        $programs = [
            'bsit' => 'BS Information Technology',
            'bsccs' => 'BS Computer Science',
        ];
        $program = $request->query('program');
        $students = Student::query()
            ->when(isset($programs[$program]), fn ($query) => $query->where('program', $programs[$program]))
            ->latest()
            ->get();

        return view('students.list', compact('students', 'program'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => [
                'required',
                'string',
                'regex:/^[0-9]{4}-[0-9]{4}$/',
                'unique:students,student_id',
            ],

            'first_name' => [
                'required',
                'string',
                'max:100',
            ],

            'middle_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'last_name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:students,email',
            ],

            'mobile_number' => [
                'required',
                'numeric',
                'digits_between:10,11',
            ],

            'date_of_birth' => [
                'required',
                'date',
                'before_or_equal:today',
            ],

            'gender' => [
                'required',
                'string',
                'max:30',
            ],

            'program' => [
                'required',
                'string',
                'max:100',
            ],

            'year_level' => [
                'required',
                'string',
                'max:30',
            ],

            'address' => [
                'required',
                'string',
                'max:1000',
            ],

            'profile_picture' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        $imagePath = $request->file('profile_picture')
            ->store('student-profiles', 'public');

        $validated['profile_picture'] = $imagePath;

        $student = Student::create($validated);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student registered successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}