<?php

use App\Http\Controllers\OtherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// Students Route
// index
Route::get('/', [StudentController::class, 'index']);
// create
Route::get('/students/create', [StudentController::class, 'create']);
// show
Route::get('/students/{student}', [StudentController::class, 'show']);
// edit
Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
// update
Route::put('/students/{student}', [StudentController::class, 'update']);
// store
Route::post('/students', [StudentController::class, 'store']);
// destroy
Route::delete('/students/{student}', [StudentController::class, 'destroy']);


// Other Route
// index : other
Route::get('/other', [OtherController::class, 'index']);

// Auth Route
// register page
Route::get('/register', [UserController::class, 'register']);
// store user
Route::post('/register', [UserController::class, 'store']);
// login page
Route::get('/login', [UserController::class, 'login']);
// login user
Route::post('/login', [UserController::class, 'auth']);
// logout user
Route::get('/logout', [UserController::class, 'logout']);
