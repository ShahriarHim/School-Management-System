<?php
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/teachers', function () {
    return view('teachers');
});
Route::get('/galary', function () {
    return view('galary');
});

