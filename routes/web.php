<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EventController;
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

Route::get('/about', function(){
    return view('pages.about');
});

Route::get('/contact', function(){
    return view('pages.contact');
});


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/noticeboard', [NoticeBoardController::class, 'index'])->name('noticeboard.index');
Route::get('/noticeboard-details/{id}', [NoticeBoardController::class, 'show'])->name('noticeboard.show');
//Sobuj Part
Route::get('/coaches', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/galdetails/{id}', [GalleryDetailsController::class, 'show'])->name('gallery.details');
Route::get('/events', [EventController::class, 'show'])->name('events.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
