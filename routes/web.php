<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index']);
Route::get('/students/{student}', [StudentController::class, 'show']);
