<?php

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



Auth::routes();

Route::get('/', 'Front@index')->name('home');
Route::get('/shop', 'Front@shop')->name('shop');
Route::get('/comic/{id}','Front@comic')->name('comic');
Route::get('/author/{id}','Front@author')->name('author');
Route::get('/serie/{id}','Front@serie')->name('serie');
Route::get('/publisher/{id}','Front@publisher')->name('publisher');
Route::get('/genre/{id}','Front@genre')->name('genre');
Route::get('/contact', 'Front@contact')->name('contact');
Route::get('/about', 'Front@about')->name('about');
Auth::routes();
 Route::get('/admin','AdminController@index')->name('admin');
 
Route::group(['middleware'=>'auth','prefix' => 'admin'],function(){
    Route::group(['middleware'=>'isAdmin'], function(){
            Route::resource('users','AdminUserController');
            Route::resource('authors','AuthorController');
            Route::resource('series','SerieController');
            Route::resource('comics','ComicController');
            Route::resource('genres','GenreController');
            Route::resource('publishers','PublisherController');
            Route::resource('roles','RoleController');
    });
});
