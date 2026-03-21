<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// index
Route::get('/', [StudentController::class, 'index']);
//create
Route::get('/students/create', [StudentController::class, 'create']);
//show
Route::get('/students/{student}', [StudentController::class, 'show']);
// store
Route::post('/students', [StudentController::class, 'store']);
//
