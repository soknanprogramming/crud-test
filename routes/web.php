<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// index
Route::get('/', [StudentController::class, 'index']);
// create
Route::get('/students/create', [StudentController::class, 'create']);
// show
Route::get('/students/{student}', [StudentController::class, 'show']);
// edit
Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
// store
Route::post('/students', [StudentController::class, 'store']);
// destroy
Route::delete('/students/{student}', [StudentController::class, 'destroy']);
