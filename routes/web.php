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

Route::get('/', function () {
    return view('index');
});

Route::get('/about', 'blogcontroller@index')->name('blog.index');
Route::get('/about/create', 'blogcontroller@create')->name('blog.create');
Route::post('/about/store', 'blogcontroller@store')->name('blog.store');
Route::get('/about/{blog}', 'blogcontroller@show')->name('blog.show');
Route::get('/about/{blog}/edit', 'blogcontroller@edit')->name('blog.edit');
Route::put('/about/{blog}', 'blogcontroller@update')->name('blog.update');
