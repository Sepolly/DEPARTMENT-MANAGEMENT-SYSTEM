<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Models\Lecturer;
use App\Models\Module;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// ADMIN ROUTES
Route::get('/admin/login', [AdminController::class,'showLogin']);
Route::post('/admin/login',[AdminController::class,'login']);

Route::prefix('admin')->group(function(){
    
    Route::get('/admin/makeadmin',[AdminController::class,'showMakeAdmin']);
    Route::get('/', [AdminController::class,'dashboard'])->name('admin.dashboard');
    
    Route::get('/addStudent', function(){
        return view('admin.addStudent');
    });
    Route::get('/addModule', function(){
        $lecturers = Lecturer::all();
        return view('admin.addModule',['lecturers' => $lecturers]);
    });
    Route::get('/addLecturer', function(){
        return view('admin.addLecturer');
    });
    
    Route::post('/admin/makeadmin',[AdminController::class,'makeAdmin']);
    Route::post('/addLecturer',[AdminController::class,'addLecturer']);
    Route::post('/addModule',[AdminController::class,'addModule']);
    Route::post('/addStudent',[AdminController::class,'addStudent']);

});




// STUDENT ROUTES
Route::get('/student/login',[StudentController::class,'showLoginForm'])->name('login');
Route::post('/student/login',[StudentController::class,'login']);

Route::middleware(['student'])->prefix('student')->group(function(){
    
    // GET REQUESTS
    Route::get('/', [StudentController::class,'index'])->name('student.home');
    Route::get('/profile/{regno}',[StudentController::class,'showProfile']);
    Route::get('/logout',[StudentController::class,'logout']);
    Route::get('/update/password/{regno}',[StudentController::class,'showPasswordUpdateForm']);
    Route::get('/update/image/{regno}',[StudentController::class,'showImageUpdateForm']);
    Route::delete('/update/image/{regno}',[StudentController::class,'deleteImage']);

    // POST REQUESTS
    Route::post('/update/password/{regno}',[StudentController::class,'updatePassword']);
    Route::post('/update/image/{regno}',[StudentController::class,'updateImage']);
    
});


