<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

Route::get('/', function () {
    return view('Public.Main');
});

Route::get('/contact-form',function(){
    return view('Public.Contact');
});

Route::get('/topic-details',function(){
    return view('Public.TopicDetails');
});

Route::get('/topic-listing',function(){
    return view('Public.TopicListing');
});