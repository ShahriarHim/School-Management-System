<?php

use App\Http\Controllers\aboutPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryDetailsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\SchoolDetailController;

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

Route::resource('contact',ContactController::class)->names('contact');

Route::get('/admin/questions', [QuestionsController::class,'index']);

Route::resource('admin/school', SchoolDetailController::class)->names('admin.school');



//Sobuj Part
Route::get('/coaches', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/galdetails/{id}', [GalleryDetailsController::class, 'show'])->name('gallery.details');
Route::get('/events', [EventController::class, 'show'])->name('events.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
