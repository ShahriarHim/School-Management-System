<?php
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EventController;
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
    return view('pages.noticeboardDetails',['title'=>$title]);
})->name('noticeboard-details');

Route::get('/about', function(){
    return view('pages.about');
});

Route::get('/contact', function(){
    return view('pages.contact');
});




//Sobuj Part
Route::get('/coaches', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/galdetails/{id}', [GalleryDetailsController::class, 'show'])->name('gallery.details');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
