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
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ReportController;


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

Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('/', function () {
    return view('auth/login');
});

Route::get('/overview', function () {
    return view('/overview');
});

// Blog Controller
Route::resource('blogs', BlogController::class);
Route::resource('/blogs', BlogController::class);

// User Controller
Route::resource('adminUser', UsersController::class);
Route::resource('/adminUser', UsersController::class);

Route::get('/adminUser', [App\Http\Controllers\UsersController::class, 'index'])->name('adminUser.index');
Route::delete('/adminUser/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])
    ->name('adminUser.destroy');

// Forum Controller
Route::resource('adminForum', ForumController::class);
Route::resource('/adminForum', ForumController::class);

Route::get('/adminForum', [App\Http\Controllers\ForumController::class, 'index'])->name('post.index');
Route::delete('/adminForum/{id}', [App\Http\Controllers\ForumController::class, 'destroy'])
    ->name('post.destroy');

// Contact Form Controller
Route::resource('adminForm', FormsController::class);
Route::resource('/adminForm', FormsController::class);

Route::get('/adminForm', [App\Http\Controllers\FormsController::class, 'index'])->name('adminForm.index');
Route::delete('/adminForm/{id}', [App\Http\Controllers\FormsController::class, 'destroy'])
    ->name('adminForm.destroy');

// Newsletter Controller
Route::resource('newsletter', NewsletterController::class);
Route::resource('/newsletter', NewsletterController::class);

Route::get('/newsletter', [App\Http\Controllers\NewsletterController::class, 'index'])->name('newsletter.index');
Route::delete('/newsletter/{id}', [App\Http\Controllers\NewsletterController::class, 'destroy'])
    ->name('newsletter.destroy');

// Generate Report
Route::get('/generate-user-report', [App\Http\Controllers\ReportController::class, 'generateUserReport'])->name('UserReport.pdf');
Route::get('/generate-blog-report', [App\Http\Controllers\ReportController::class, 'generateBlogReport'])->name('BlogReport.pdf');
Route::get('/generate-form-report', [App\Http\Controllers\ReportController::class, 'generateFormReport'])->name('FormReport.pdf');
Route::get('/generate-news-report', [App\Http\Controllers\ReportController::class, 'generateNewsReport'])->name('NewsReport.pdf');
