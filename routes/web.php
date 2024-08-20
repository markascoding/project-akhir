<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudyRoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resources([
    'dashboard' => DashboardController::class,
    'teacher' => TeacherController::class,
    'lesson' => LessonController::class,
<<<<<<< HEAD
    'user' => UserController::class,
=======
    'studyroom' => StudyRoomController::class,
    'user' => App\Http\Controllers\UserController::class,
>>>>>>> f67341acf53e570c5ff263354efecd6356bb75b5
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
