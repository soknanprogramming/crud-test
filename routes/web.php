<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $students = Student::all();
    return view('welcome', compact('students'));
});
