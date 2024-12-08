<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminNoticeBoardController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('admin')->group(function () {
    Route::get('/noticeboard', [AdminNoticeBoardController::class, 'index'])->name('admin.noticeboard.index'); // Displays all notices
    Route::get('/noticeboard/create', [AdminNoticeBoardController::class, 'create'])->name('admin.noticeboard.create'); // Create form
    Route::post('/noticeboard/store', [AdminNoticeBoardController::class, 'store'])->name('admin.noticeboard.store'); // Store notice
    Route::get('/noticeboard/{id}/edit', [AdminNoticeBoardController::class, 'edit'])->name('admin.noticeboard.edit'); // Edit form
    Route::put('/noticeboard/{id}', [AdminNoticeBoardController::class, 'update'])->name('admin.noticeboard.update'); // Update notice
    Route::delete('/noticeboard/{id}', [AdminNoticeBoardController::class, 'destroy'])->name('admin.noticeboard.destroy'); // Delete notice
});
