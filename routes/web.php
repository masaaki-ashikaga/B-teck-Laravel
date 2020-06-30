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
    return view('welcome');
});

Route::group(['prefix' => 'boards', 'middleware' => 'auth'], function(){
    Route::get('index','BoardsController@index')->name('boards.index');
    Route::get('create', 'BoardsController@create')->name('boards.create');
    Route::post('store', 'BoardsController@store')->name('boards.store');
    Route::get('edit/{id}', 'BoardsController@edit')->name('boards.edit');
    Route::post('update', 'BoardsController@update')->name('boards.update');
    Route::post('destroy/{id}', 'BoardsController@destroy')->name('boards.destroy');
});

Route::group(['middleware' => 'auth'], function(){
    Route::resource('likes', 'LikesController', ['only' => ['store', 'destroy']]);
});

Route::get('/users/login', 'UserController@login');
Route::get('/users/register', 'UserController@register');
Route::post('/users/register', 'UserController@home');


Route::get('/tasks', 'TaskController@index');
Route::post('/tasks', 'TaskController@create');
Route::post('/delete', 'TaskController@delete');
Route::post('/statusUpdate', 'TaskController@statusUpdate');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
