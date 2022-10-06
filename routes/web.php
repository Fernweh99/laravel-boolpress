<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/admin', 'Admin\HomeController@index')->middleware('auth')->name('admin.home');

// Resource admin
Route::middleware('auth')->name('admin.')->namespace('Admin')->prefix('admin')->group(function (){
    // Home
    Route::get('/', 'HomeController@index')->name('home');

    // Posts
    Route::resource('posts', 'PostController');

    // Tags
    Route::resource('tags', 'TagController');

    // Categories
    Route::resource('categories', 'CategoryController');
    
    Route::get('/{any}', function(){
        abort(404);
    })->where('any', '.*');

});

Route::get('/{any?}', 'Guest\HomeController@index')->name('guest.home')->where('any', '.*');