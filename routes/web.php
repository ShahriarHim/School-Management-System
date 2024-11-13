<?php
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/teachers', function () {
    return view('teachers');
});
Route::get('/gallery', function () {
    return view('gallery');
});
