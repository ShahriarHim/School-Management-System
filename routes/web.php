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
use App\Http\Controllers\NoticeBoardController;

Route::get('/', function () {
    return view('pages.home');
});
// Route::get('/noticeboard', function () {
//     return view('pages.noticeboard');
// });
// Route::get('/noticeboard-details', function ($title) {
//     return view('pages.noticeboardDetails');
// })->name('noticeboard-details');



Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/noticeboard', [NoticeBoardController::class, 'index'])->name('noticeboard.index');
Route::get('/noticeboard-details/{id}', [NoticeBoardController::class, 'show'])->name('noticeboard.show');


/* --------------admin routes------------------------- */

Route::get('/page-content',[PageContentController::class,'create'])->name('page-content');
Route::post('/page-content',[PageContentController::class,'store'])->name('page-content');


Route::get('/about',[aboutPageController::class,'index'])->name('about');

/* Route::get('/contact',[ContactPageController::class,'index'])->name('contact');
 */

/* Route::post('/contact',[ContactController::class,'store'])->name('contact.store');  */

Route::resource('contact',ContactController::class)->names('contact');


//Sobuj Part
Route::get('/coaches', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/galdetails/{id}', [GalleryDetailsController::class, 'show'])->name('gallery.details');
Route::get('/events', [EventController::class, 'show'])->name('events.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
