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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pages', 'EditorController@index')->name('editor');
Route::get('pages/new', 'EditorController@create')->name('editor.new');
Route::get('pages/preview', 'EditorController@show')->name('editor.show');
