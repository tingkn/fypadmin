<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,PostController,UserController,
    ReplyController,CommentController,VoteController,
    SettingController, ContactFormController, FormsController};
use App\Http\Controllers\CompanyCRUDController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ForumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin Controller
Route::resource('companies', CompanyCRUDController::class);
Route::resource('/admin/companies', CompanyCRUDController::class);

Route::resource('blogs', BlogController::class);
Route::resource('/admin/blogs', BlogController::class);

// Blog Controller
Route::resource('blog', UserBlogController::class);
Route::resource('/blog', UserBlogController::class);

// User Controller
Route::resource('adminUser', UsersController::class);
Route::resource('/admin/adminUser', UsersController::class);

Route::get('/admin/adminUser', [App\Http\Controllers\UsersController::class, 'index'])->name('adminUser.index');
Route::delete('/admin/adminUser/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])
    ->name('adminUser.destroy');

// Forum Controller
Route::resource('adminForum', ForumController::class);
Route::resource('/admin/adminForum', ForumController::class);

Route::get('/admin/adminForum', [App\Http\Controllers\ForumController::class, 'index'])->name('post.index');
Route::delete('/admin/adminForum/{id}', [App\Http\Controllers\ForumController::class, 'destroy'])
    ->name('post.destroy');

// Admin Contact Form
Route::resource('adminForm', FormsController::class);
Route::resource('/admin/adminForm', FormsController::class);

Route::get('/admin/adminForm', [App\Http\Controllers\FormsController::class, 'index'])->name('adminForm.index');
Route::delete('/admin/adminForm/{id}', [App\Http\Controllers\FormsController::class, 'destroy'])
    ->name('adminForm.destroy');