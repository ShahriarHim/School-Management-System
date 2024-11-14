<?php
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('pages.home');
});
Route::get('/noticeboard', function () {
    return view('pages.noticeboard');
});

Route::get('/about', function(){
    return view('pages.about');
});

Route::get('/contact', function(){
    return view('pages.contact');
});

Route::get('/events', function () {
    return view('pages.events');
});

Route::get('/teachers', function () {
    return view('pages.teachers');
});
Route::get('/gallery', function () {
    return view('pages.gallery');
});

