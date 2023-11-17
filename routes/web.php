<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

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

// Main Pages Routes :-  

Route::get('/',[MainController::class,'home']);
Route::get('/searchresult', [MainController::class, 'home'])->name('search.result');
Route::get('/topic-details/{id}',[MainController::class,'topicdetails'])->name('blog.show')->middleware('googleauth');
Route::post('/topic-details/{id}', [MainController::class, 'storecomments']);
Route::get('/topic-listing',[MainController::class,'topiclisting']);
Route::any('/toggle-bookmark/{blog_id}', [MainController::class, 'toggleBookmark'])->name('toggle.bookmark')->middleware('googleauth');
Route::get('/show-bookmarks', [MainController::class, 'showBookmarks'])->name('show.bookmark')->middleware('googleauth');

// User Signup and Logout :-

Route::get('/signup',[MainController::class,'UserLogin']);
Route::post('auth/logout', [AuthController::class, 'UserLogout'])->name('user.logout');


// Google Auth Routes ::-

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');

// Github Auth Routes ::-

Route::get('/auth/github', [AuthController::class, 'redirectToGithub'])->name('github.login');
Route::get('/auth/github/callback', [AuthController::class, 'handleGitHubCallback'])->name('github.callback');


// User Contact Querys Routes :-

Route::get('/contact',[MainController::class,'contact']);
Route::post('/contact',[MainController::class,'storecontact']);

// Admin Routes :

Route::get('/add-blog',[AdminController::class,'AddBlog']);
Route::get('/add-category',[AdminController::class,'AddCategory']);
Route::post('/storecategories',[AdminController::class,'StoreCategory'])->name('store-category');
Route::post('/storeblogs',[AdminController::class,'StoreBlog'])->name('store-blog');
Route::get('/blog-list',[AdminController::class,'ShowBlogs']);
Route::get('/blog/delete/{id}',[AdminController::class,'DeleteBlog']);
Route::get('/blog/edit/{id}',[AdminController::class,'EditBlog']);
Route::put('/update-blog/{id}',[AdminController::class,'UpdateBlog'])->name('update-blog');
Route::get('/admin/dashboard',[AdminController::class,'Dashboard']);
Route::get('/customer-querys',[AdminController::class,'ShowCustomerQuerys']);
Route::get('/querydelete/{id}',[AdminController::class,'DeleteQuery']);
Route::get('/new-users',[AdminController::class,'ShowUsers']);
Route::get('/usersdelete/{id}',[AdminController::class,'DeleteUsers']);