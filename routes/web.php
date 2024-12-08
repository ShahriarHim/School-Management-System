<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\aboutPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\AdminGalleryController;
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
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserTestController;
use App\Http\Controllers\ApiController;
// Route::get('/', function () {
//     return view('testJs');
// });
// Route::get('/noticeboard', function () {
//     return view('pages.noticeboard');
// });
// Route::get('/noticeboard-details', function ($title) {
//     return view('pages.noticeboardDetails');
// })->name('noticeboard-details');



Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/noticeboard', [NoticeBoardController::class, 'index'])->name('noticeboard.index');
Route::get('/noticeboard-details/{id}', [NoticeBoardController::class, 'show'])->name('noticeboard.show');


/* --------------admin routes------------------------- */

/*Notice*/

Route::prefix('admin')->group(function () {
    Route::get('/noticeboard', [AdminNoticeBoardController::class, 'index'])->name('admin.noticeboard.index'); // Displays all notices
    Route::get('/noticeboard/create', [AdminNoticeBoardController::class, 'create'])->name('admin.noticeboard.create'); // Create form
    Route::post('/noticeboard/store', [AdminNoticeBoardController::class, 'store'])->name('admin.noticeboard.store'); // Store notice
    Route::get('/noticeboard/{id}/edit', [AdminNoticeBoardController::class, 'edit'])->name('admin.noticeboard.edit'); // Edit form
    Route::put('/noticeboard/{id}', [AdminNoticeBoardController::class, 'update'])->name('admin.noticeboard.update'); // Update notice
    Route::delete('/noticeboard/{id}', [AdminNoticeBoardController::class, 'destroy'])->name('admin.noticeboard.destroy'); // Delete notice
});

Route::get('/page-content', [PageContentController::class, 'create'])->name('page-content');
Route::post('/page-content', [PageContentController::class, 'store'])->name('page-content');



//----------Salauddin's route------------

Route::get('/about', [aboutPageController::class, 'index'])->name('about');

Route::get('/admin/questions', [QuestionsController::class,'index'])->name('admin.questions');

Route::resource('contact',ContactController::class)->names('contact');

Route::resource('admin/page-content', PageContentController::class)->names('admin.page-content');

Route::resource('admin/school', SchoolDetailController::class)->names('admin.school');

Route::resource('test',TestController::class)->names('test');


//----------Salauddin's route end------------


//Sobuj Part
Route::get('/coaches', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/galdetails/{id}', [GalleryDetailsController::class, 'show'])->name('gallery.details');
Route::get('/events', [EventController::class, 'show'])->name('events.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/admin', function (){ $user = Auth::user(); return view('layouts.admin', ['user'=>$user]);})->name('admin');

Route::middleware(['web'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/events-management', [AdminEventController::class, 'index'])->name('admin.eventsmanagement.index');
        Route::get('/events-management/create', [AdminEventController::class, 'create'])->name('admin.eventsmanagement.create');
        Route::post('/events-management/store', [AdminEventController::class, 'store'])->name('admin.eventsmanagement.store');
        Route::get('/events-management/{id}/edit', [AdminEventController::class, 'edit'])->name('admin.eventsmanagement.edit');
        Route::put('/events-management/{id}', [AdminEventController::class, 'update'])->name('admin.eventsmanagement.update');
        Route::delete('/events-management/{id}', [AdminEventController::class, 'destroy'])->name('admin.eventsmanagement.destroy');
    });
});



Route::middleware(['web'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/galleries', [AdminGalleryController::class, 'index'])->name('admin.galleries.index');
        Route::get('/galleries/create', [AdminGalleryController::class, 'create'])->name('admin.galleries.create');
        Route::post('/galleries/store', [AdminGalleryController::class, 'store'])->name('admin.galleries.store');
        Route::get('/galleries/{id}/edit', [AdminGalleryController::class, 'edit'])->name('admin.galleries.edit');
        Route::put('/galleries/{id}', [AdminGalleryController::class, 'update'])->name('admin.galleries.update');
        Route::delete('/galleries/{id}', [AdminGalleryController::class, 'destroy'])->name('admin.galleries.destroy');
    });
});


Route::prefix('admin')->group(function () {
    Route::get('/galleries/{gallery_id}/images', [GalleryImageController::class, 'index'])->name('admin.galleries.images.index');
    Route::get('/galleries/{gallery_id}/images/create', [GalleryImageController::class, 'create'])->name('admin.galleries.images.create');
    Route::post('/galleries/{gallery_id}/images/store', [GalleryImageController::class, 'store'])->name('admin.galleries.images.store');
    Route::get('/galleries/{gallery_id}/images/{id}/edit', [GalleryImageController::class, 'edit'])->name('admin.galleries.images.edit');
    Route::put('/galleries/{gallery_id}/images/{id}', [GalleryImageController::class, 'update'])->name('admin.galleries.images.update');
    Route::delete('/galleries/{gallery_id}/images/{id}', [GalleryImageController::class, 'destroy'])->name('admin.galleries.images.destroy');

});
Route::get('/utest', [UserTestController::class, 'processUsers']);
// routes/web.php

Route::get('/signup', [SignupController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'register'])->name('signup.submit');

Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


