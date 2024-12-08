<?php

use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\aboutPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryDetailsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\SchoolDetailController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\AdminNoticeBoardController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserTestController;

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


//----------Salauddin's route------------

Route::get('/about', [aboutPageController::class, 'apiIndex'])->name('about');

Route::get('/admin/questions', [QuestionsController::class,'index'])->name('admin.questions');

Route::get('/contact/index', [ContactController::class, 'apiIndex'])->name('contact.index');

Route::resource('contact',ContactController::class)->names('contact');

Route::resource('admin/page-content', PageContentController::class)->names('admin.page-content');

Route::resource('admin/school', SchoolDetailController::class)->names('admin.school');

Route::get('/test/index', [TestController::class, 'apiIndex'])->name('test');
Route::resource('test',TestController::class)->names('test');


//----------Salauddin's route end------------





//Sobuj Part
Route::get('/api-events', [AdminEventController::class, 'apiIndex'])->name('api.events.index');
Route::post('/events/store', [AdminEventController::class, 'store'])->name('api.events.store');
Route::put('/api-events/{id}', [AdminEventController::class, 'APIupdate'])->name('api.events.APIupdate');
Route::delete('/events/{id}', [AdminEventController::class, 'APIdelete'])->name('api.events.APIdelete');
