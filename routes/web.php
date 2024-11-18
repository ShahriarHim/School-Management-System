<?php

use App\Http\Controllers\aboutPageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageContentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.home');
});
Route::get('/noticeboard', function () {
    return view('pages.noticeboard');
});
Route::get('/noticeboard-details', function () {
    return view('pages.noticeboardDetails');
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

Route::get('/page-content',[PageContentController::class,'create'])->name('page-content');
Route::post('/page-content',[PageContentController::class,'store'])->name('page-content');


Route::get('/about',[aboutPageController::class,'index'])->name('about');



Route::get('/contact', function(){
    return view('pages.contact');
});
