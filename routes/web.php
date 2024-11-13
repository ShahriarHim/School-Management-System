<?php
use Illuminate\Support\Facades\Route;
Route::get('/home', function () {
    return view('home');
});

Route::get('/home/events', function () {
    return view('events');
});

Route::get('/home/teachers', function () {
    return view('teachers');
});
Route::get('/home/galary', function () {
    return view('galary');
});
