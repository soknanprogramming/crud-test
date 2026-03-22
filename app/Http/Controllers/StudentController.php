<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->input('search'));
        $search = $request->input('search', '');
        // $students = Student::all();
        $students = Student::where('first_name', 'ilike', "%" . $search . "%")
            ->orWhere('last_name', 'ilike', "%" . $search . "%")
            ->orWhere('email', 'ilike', "%" . $search . "%")
            ->orWhere('phone', 'ilike', "%" . $search . "%")
            ->orWhere('address', 'ilike', "%" . $search . "%")
            ->orWhere('gender', 'ilike', "%" . $search . "%")
            ->orWhere('dob', 'ilike', "%" . $search . "%")
            ->orderBy('created_at', 'desc')
            ->get();



        return view('student.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'first_name' => 'required|string|min:1|max:25',
            'last_name' => 'required|string|min:1|max:25',
            'gender' => 'required|string|in:male,female,other',
            'dob' => 'required|date',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|min:9|max:15',
            'address' => 'required|string'
        ]);

        Student::create($validated);

        return redirect('/');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return view('student.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // dd($student->first_name);
        return view('student.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/')->with('success', 'Student deleted successfully!');
    }
}
