<?php

use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});







//Sobuj Part
Route::get('/api-events', [AdminEventController::class, 'apiIndex'])->name('api.events.index');
Route::post('/api-events', [AdminEventController::class, 'store'])->name('api.events.store');
Route::get('/api-galleries', [AdminGalleryController::class, 'apiIndex'])->name('api.galleries.index');
Route::put('/api-events/{id}', [AdminEventController::class, 'APIupdate'])->name('api.events.APIupdate');
Route::delete('/events/{id}', [AdminEventController::class, 'APIdelete'])->name('api.events.APIdelete');
