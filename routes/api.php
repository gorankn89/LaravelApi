<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GradebookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/gradebooks/freeteachers', [TeacherController::class, 'getFreeTeachers'])->middleware('auth:api');
Route::post('/gradebooks', [GradebookController::class, 'store'])->middleware('auth:api');
Route::get('/gradebooks', [GradebookController::class, 'index'])->middleware('auth:api');
Route::get('/teachers', [TeacherController::class, 'index'])->middleware('auth:api');
Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->middleware('auth:api');
Route::get('/gradebooks/{gradebook}', [GradebookController::class, 'show'])->middleware('auth:api');
Route::get('/my-gradebook', [GradebookController::class, 'myGradebook'])->middleware('auth:api');
Route::post('/gradebooks/{gradebook}/students', [StudentController::class, 'store'])->middleware('auth:api');
Route::post('/gradebooks/{gradebook}/comments', [CommentController::class, 'store'])->middleware('auth:api');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth:api');
Route::delete('/gradebooks/{gradebook}', [GradebookController::class, 'destroy'])->middleware('auth:api');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->middleware('auth:api');


Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/me', [AuthController::class, 'getActiveUser'])->middleware('auth:api');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:api');
// ->middleware('auth:api');
Route::post('/auth/refresh', [AuthController::class, 'refreshToken']);
