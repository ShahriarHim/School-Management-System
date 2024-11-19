<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\aboutPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryDetailsController;


Route::get('/', function () {
    return view('pages.home');
});
Route::get('/noticeboard', function () {
    return view('pages.noticeboard');
});
Route::get('/noticeboard-details/{title}', function ($title) {
    return view('pages.noticeboardDetails', ['title'=> $title]);
})->name('noticeboard-details');



Route::get('/', [HomeController::class, 'index'])->name('home.index');


/* --------------admin routes------------------------- */

Route::get('/page-content',[PageContentController::class,'create'])->name('page-content');
Route::post('/page-content',[PageContentController::class,'store'])->name('page-content');


Route::get('/about',[aboutPageController::class,'index'])->name('about');



Route::get('/contact', function(){
    return view('pages.contact');
});


//Sobuj Part
Route::get('/coaches', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/galdetails/{id}', [GalleryDetailsController::class, 'show'])->name('gallery.details');
Route::get('/events', [EventController::class, 'show'])->name('events.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/signup', [SignupController::class, 'showSignupForm']);
Route::post('/signup', [SignupController::class, 'signup']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin', function(){
    return view('admin.home');
});
