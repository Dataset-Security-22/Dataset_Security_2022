<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Task;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Learning;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GoogleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login & Register
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/registration', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/registration', [AuthController::class, 'store']);

// Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Dashboard
Route::get('/dashboard', function () {
	$user = User::where('email', Session::get('email'))->first();
	if (Session::get('id_role')==1) {
		$student = User::where('id_role', 3)->count();
		$lecturer = User::where('id_role', 2)->count();
		$category = Category::count();
		$task = Task::count();
		$learning = Learning::count();
		return view('dashboard.admin', compact('student', 'lecturer', 'category', 'task', 'learning'));
	} elseif (Session::get('id_role')==2) {
		return view('dashboard.lecturer', compact('user'));
	} else {
		$learning = Learning::where('id_category', $user->id_category)->get();
		$task = Task::where('id_category', $user->id_category)->get();
		return view('dashboard.student', compact('user', 'learning', 'task'));
	}
})->middleware('otentikasi');

// Profile & Password
Route::get('/profile', [ProfileController::class, 'index'])->middleware('check_log');
Route::get('/password', [ProfileController::class, 'password'])->middleware('otentikasi');
Route::patch('/profile/image', [ProfileController::class, 'image'])->middleware('otentikasi');
Route::patch('/profile', [ProfileController::class, 'update'])->middleware('check_log');
Route::put('/password', [ProfileController::class, 'change'])->middleware('otentikasi');

// Class
Route::get('/class', [ClassController::class, 'index'])->middleware('otentikasi');
Route::get('/class/get', [ClassController::class, 'get'])->middleware('otentikasi');
Route::post('/class/add', [ClassController::class, 'add'])->middleware('otentikasi');
Route::patch('/class/edit', [ClassController::class, 'edit'])->middleware('otentikasi');
Route::delete('/class/del', [ClassController::class, 'del'])->middleware('otentikasi');

// Lecturer
Route::get('/lecturer', [LecturerController::class, 'index'])->middleware('otentikasi');
Route::get('/lecturer/get', [LecturerController::class, 'get'])->middleware('otentikasi');
Route::get('/lecturer/user', [LecturerController::class, 'user'])->middleware('otentikasi');
Route::post('/lecturer/add', [LecturerController::class, 'add'])->middleware('otentikasi');
Route::post('/lecturer/store', [LecturerController::class, 'store'])->middleware('otentikasi');
Route::delete('/lecturer/del', [LecturerController::class, 'del'])->middleware('otentikasi');


// Student
Route::get('/student', [StudentController::class, 'index'])->middleware('otentikasi');
Route::get('/student/get', [StudentController::class, 'get'])->middleware('otentikasi');
Route::delete('/student', [StudentController::class, 'destroy'])->middleware('otentikasi');

// Category
Route::get('/category', [CategoryController::class, 'index'])->middleware('otentikasi');
Route::get('/category/get', [CategoryController::class, 'get'])->middleware('otentikasi');
Route::post('/category/add', [CategoryController::class, 'add'])->middleware('otentikasi');
Route::post('/category/edit', [CategoryController::class, 'edit'])->middleware('otentikasi');
Route::post('/category/del', [CategoryController::class, 'del'])->middleware('otentikasi');

// Material
Route::resource('learning', LearningController::class)->middleware('otentikasi');

// Laravel File Manager Unisharp
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'otentikasi']], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});

// Task
Route::resource('task', TaskController::class)->middleware('otentikasi');
Route::get('/task/completion/{slug}', function ($slug) {
	$task = Task::where('slug', $slug)->first();
	if ($task) {
		$answer = Answer::where('id_task', $task->id)->get();
		return view('task/completion', compact('answer'));
	} else {
		abort(404);
	}
})->middleware('otentikasi');

// Answer
Route::post('/answer', function () {
	$user = User::where('email', Session::get('email'))->first();
	$answer = Answer::where('id_student', $user->id)->where('id_task', request('task'))->count();
	if ($answer < 1) {
		Answer::create([
			'id_student' => $user->id,
			'id_task' => request('task'),
			'answer' => request('answer')
		]);

		User::where('email', Session::get('email'))->update(['skor' => $user->skor + 10]);
	}

	return redirect('dashboard')->with('message', "<script>swal('Selamat!', 'Selamat jawaban anda berhasil disimpan!', 'success');</script>");
})->middleware('otentikasi');

Route::post('/answer/post', function () {
	$answer = Answer::where('id_student', request('id_student'))->where('id_task', request('id_task'))->first();

	return response()->json($answer);
})->middleware('otentikasi');

// Leaderboard
Route::get('/leaderboard', function () {
	$my = User::where('email', Session::get('email'))->first();
	$student = User::where('id_role', 3)->limit(10)->orderBy('skor', 'desc')->get();
	return view('leader', compact('student', 'my'));
})->middleware('otentikasi');