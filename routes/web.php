<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
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

// Home route
Route::get('/',fn()=>view('home'));

// Route::get('/test',fn()=>view('emails.studentAdded'));


// ADMIN ROUTES
Route::get('/admin/login', [AdminController::class,'showLogin']);
Route::post('/admin/login',[AdminController::class,'login']);
Route::get('/admin', [AdminController::class,'dashboard']);

Route::prefix('admin')->group(function(){
    
    Route::get('/makeadmin',[AdminController::class,'showMakeAdmin']);
    
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
    Route::get('/addCourse', function(){
        return view('admin.addCourse');
    });
    
    Route::post('/makeadmin',[AdminController::class,'makeAdmin']);
    Route::post('/addLecturer',[AdminController::class,'addLecturer']);
    Route::post('/addModule',[AdminController::class,'addModule']);
    Route::post('/addStudent',[AdminController::class,'addStudent']);
    Route::post('/addCourse',[AdminController::class,'addCourse']);

});


// LECTURER ROUTES
Route::get('/lecturer/login',[LecturerController::class,'showLoginForm']);
Route::post('/lecturer/login',[LecturerController::class,'login']);

Route::middleware(['lecturer'])->prefix('lecturer')->group(function(){

    Route::get('/', [LecturerController::class,'dashboard']);
    Route::get('/module/{module_code}', [LecturerController::class,'module']);
    Route::get('/logout', [LecturerController::class,'logout']);

    Route::post('/notes/upload/{module_code}', [LecturerController::class,'noteUpload']);
    Route::post('/assignment/upload/{module_code}', [LecturerController::class,'assignmentUpload']);
    Route::post('/module/update/{module_code}', [LecturerController::class,'updateModule']);
});







// STUDENT ROUTES
Route::get('/student/login',[StudentController::class,'showLoginForm'])->name('login');
Route::post('/student/login',[StudentController::class,'login']);
Route::get('/student/passwordReset',[studentController::class,'showPasswordReset']);
Route::post('/student/passwordReset',[studentController::class,'PasswordReset']);

Route::middleware(['student'])->prefix('student')->group(function(){
    
    // GET REQUESTS
    Route::get('/', [StudentController::class,'index'])->name('student.home');
    Route::get('/profile/{regno}',[StudentController::class,'showProfile']);
    Route::get('/logout',[StudentController::class,'logout']);
    Route::get('/update/password/{regno}',[StudentController::class,'showPasswordUpdateForm']);
    Route::get('/update/image/{regno}',[StudentController::class,'showImageUpdateForm']);
    Route::delete('/update/image/{regno}',[StudentController::class,'deleteImage']);
    Route::get('/module/{module_code}',[StudentController::class,'module']);

    // POST REQUESTS
    Route::post('/update/password/{regno}',[StudentController::class,'updatePassword']);
    Route::post('/update/image/{regno}',[StudentController::class,'updateImage']);
    
});


