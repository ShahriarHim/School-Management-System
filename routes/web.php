<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.home');
});
Route::get('/noticeboard', function () {
    return view('pages.noticeboard');
});
Route::get('/noticeboard-details/{title}', function ($title) {
    return view('pages.noticeboardDetails', ['title'=> $title]);
})->name('noticeboard-details');

Route::get('/about', function(){
    return view('pages.about');
});

Route::get('/contact', function(){
    return view('pages.contact');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/coaches', function () {
    return view('pages.teachers');
});
Route::get('/gallery', function () {
    return view('pages.gallery');
});
Route::get('/galdetails', function () {
    return view('pages.backfromgal');
});


/* --------------admin routes------------------------- */

Route::get('/about-content',function(){
    return view('admin.aboutContent');
});
