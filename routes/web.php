<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route for login
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

// route for dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route for urls
Route::resource('urls', UrlController::class)
->middleware(['auth', 'verified']);

// Route::resource('urls', UsersController::class)
// ->middleware(['auth', 'verified']);


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Make 'add-user' available only for Admins
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('add-user', [UsersController::class, 'create'])->name('add-user');
    Route::post('add-user', [UsersController::class, 'store'])->name('store-user');
});

// users
Route::middleware(['auth', 'role:Admin'])->get('/users', [UsersController::class, 'index'])->name('users.index');

//feed back
// Show the feedback form only for 'User' role
Route::middleware(['auth', 'role:User'])->get('/feedback', function () {
    return view('feedback');
})->name('feedback.create');

// Handle feedback submission
Route::middleware(['auth', 'role:User'])->post('/feedback', [UsersController::class, 'storeFeedback'])->name('feedback.store');



// Admin Feedbacks Page (Only Admins can access)
Route::middleware(['auth', 'role:Admin'])->get('/admin/feedbacks', [UsersController::class, 'showFeedbacks'])->name('admin.feedbacks');

// route for get shortener url
Route::get('{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');



require __DIR__.'/auth.php';
