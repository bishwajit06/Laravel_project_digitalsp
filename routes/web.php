<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\InvoiceController;

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

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');
//Pages
Route::get('/course-data', [PageController::class, 'fetchcourse']);
Route::get('/course-all', [PageController::class, 'courseAll'])->name('courseAll');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/our-courses', [PageController::class, 'course'])->name('course');
Route::get('/our-teams', [PageController::class, 'team'])->name('team');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');
Route::get('/invoice/{id}', [InvoiceController::class, 'invoiceGenerate'])->name('invoice');



Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','authadmin']], function (){

    Route::resource('/user', UserController::class);
    Route::post('/userApproved/{id}', [UserController::class, 'userApproved'])->name('approved');
    Route::post('/userUnapproved/{id}', [UserController::class, 'UserUnApproved'])->name('unapproved');
    Route::resource('/profile', AdminProfileController::class);
    Route::post('/updatePassword', [AdminProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::resource('/course', CourseController::class);
    Route::resource('/payment', PaymentController::class);
    Route::post('/paymentApproved/{id}', [PaymentController::class, 'paymentApproved'])->name('payment.approved');
    Route::post('/paymentUnapproved/{id}', [PaymentController::class, 'paymentUnApproved'])->name('payment.unapproved');
    //Route::resource('/profile', ProfileController::class);
    

});

Route::group(['as'=>'user.','prefix'=>'user','middleware'=>['auth','auth']], function (){
    
    Route::resource('/profile', StudentProfileController::class);
    Route::post('/updatePassword', [StudentProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::resource('/course', StudentCourseController::class);
    Route::resource('/shopping', ShoppingController::class);

});



Route::get('students', [StudentController::class, 'index']);
Route::get('students/list', [StudentController::class, 'getStudents'])->name('students.list');




Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');


