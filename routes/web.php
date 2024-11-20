<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\aboutPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryDetailsController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\AdminNoticeBoardController;
use App\Http\Controllers\AdminEventController;


Route::get('/', function () {
    return view('pages.home');
});
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
Route::get('/admin/notice-management', function () {
    return view('admin.noticeManagement');
});

// Route::post('/admin/noticeboard/store', [AdminNoticeBoardController::class, 'store'])->name('admin.noticeboard.store');
// use App\Http\Controllers\AdminNoticeBoardController;

// Admin routes for noticeboard management
Route::middleware(['web'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/noticeboard', [AdminNoticeBoardController::class, 'index'])->name('admin.noticeboard.index');
        Route::post('/noticeboard/store', [AdminNoticeBoardController::class, 'store'])->name('admin.noticeboard.store');
        Route::get('/noticeboard/{id}/edit', [AdminNoticeBoardController::class, 'edit'])->name('admin.noticeboard.edit');
        Route::put('/noticeboard/{id}', [AdminNoticeBoardController::class, 'update'])->name('admin.noticeboard.update');
        Route::delete('/noticeboard/{id}', [AdminNoticeBoardController::class, 'destroy'])->name('admin.noticeboard.destroy');
    });
});
Route::get('/page-content', [PageContentController::class, 'create'])->name('page-content');
Route::post('/page-content', [PageContentController::class, 'store'])->name('page-content');


Route::get('/about', [aboutPageController::class, 'index'])->name('about');

/* Route::get('/contact',[ContactPageController::class,'index'])->name('contact');
 */

/* Route::post('/contact',[ContactController::class,'store'])->name('contact.store');  */

Route::resource('contact', ContactController::class)->names('contact');


//Sobuj Part
Route::get('/coaches', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/galdetails/{id}', [GalleryDetailsController::class, 'show'])->name('gallery.details');
Route::get('/events', [EventController::class, 'show'])->name('events.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/signup', [SignupController::class, 'showSignupForm']);
Route::post('/signup', [SignupController::class, 'signup']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin', function (){ $user = Auth::user(); return view('layouts.admin', ['user'=>$user]);});
Route::middleware(['web'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/events-management', [AdminEventController::class, 'index'])->name('admin.eventsmanagement.index');
        Route::post('/events-management/store', [AdminEventController::class, 'store'])->name('admin.eventsmanagement.store');
        Route::get('/events-management/{id}/edit', [AdminEventController::class, 'edit'])->name('admin.eventsmanagement.edit');
        Route::put('/events-management/{id}', [AdminEventController::class, 'update'])->name('admin.eventsmanagement.update');
        Route::delete('/events-management/{id}', [AdminEventController::class, 'destroy'])->name('admin.eventsmanagement.destroy');
    });
});
