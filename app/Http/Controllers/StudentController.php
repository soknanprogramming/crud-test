<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->input('search'));
        $search = $request->input('search', '');
        $order_by = $request->input('order_by', 'newest'); // default newest
        $gender = $request->input('gender', 'all');


        switch ($order_by) {
            case 'oldest':
                $order_by_column = 'created_at';
                $order_by_direction = 'asc';
                break;
            case 'first_name':
                $order_by_column = 'first_name';
                $order_by_direction = 'asc';
                break;
            case 'last_name':
                $order_by_column = 'last_name';
                $order_by_direction = 'asc';
                break;
            case 'age_older':
                $order_by_column = 'dob'; // we sort by date of birth for age
                $order_by_direction = 'asc'; // youngest first? use 'desc' if oldest first
                break;
            case 'age_younger':
                $order_by_column = 'dob';
                $order_by_direction = 'desc';
                break;
            case 'just_update':
                $order_by_column = 'updated_at';
                $order_by_direction = 'desc';
                break;
            case 'old_update':
                $order_by_column = 'updated_at';
                $order_by_direction = 'asc';
                break;
            case 'newest':
            default:
                $order_by_column = 'created_at';
                $order_by_direction = 'desc';
                break;
        }


        // $students = Student::all();
        $students = Student::query()
            ->gender($gender)
            ->search($search)
            ->orderBy($order_by_column, $order_by_direction)
            ->paginate(8)
            ->withQueryString();



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
        $formFields = $request->validate([
            'first_name' => 'required|string|min:1|max:25',
            'last_name' => 'required|string|min:1|max:25',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gender' => 'required|string|in:male,female,other',
            'dob' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:15',
            'address' => 'required|string'
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $formFields['image'] = $request->file('image')->store('students', 'public');
        }

        Student::create($formFields);

        return redirect('/')->with('message', 'Student created successfully!');
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
    public function update(Request $request, Student $student)
    {
        $fromFields = $request->validate([
            'first_name' => 'required|string|min:1|max:25',
            'last_name' => 'required|string|min:1|max:25',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gender' => 'required|string|in:male,female,other',
            'dob' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:15',
            'address' => 'required|string'
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            if($student->image && Storage::disk('public')->exists($student->image)){
                Storage::disk('public')->delete($student->image);
            }
            $formFields['image'] = $request->file('image')->store('students', 'public');
        } else {
            $formFields['image'] = $student->image;
        }

        // dd($formFields);

        $student->update($formFields);

        return redirect('/')->with('message', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if($student->image && Storage::disk('public')->exists($student->image)){
            Storage::disk('public')->delete($student->image);
        }

        $student->delete();
        return redirect('/')->with('message', 'Student deleted successfully!');
    }
}
