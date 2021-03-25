<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/industri', 'IndustriController@index')->name('industri');
Route::get('/industri/create', 'IndustriController@create')->name('industri.create');
Route::post('/industri/add', 'IndustriController@add')->name('industri.add');
Route::get('/industri/delete/{id}', 'IndustriController@delete')->name('industri.delete');
Route::get('/industri/edit/{id}', 'IndustriController@edit')->name('industri.edit');
Route::get('/industri/update/{id}', 'IndustriController@update')->name('industri.update');

Route::get('/indikator', 'IndikatorController@index')->name('indikator');
Route::get('/indikator/delete/{id}', 'IndikatorController@delete')->name('indikator.delete');
Route::get('/indikator/create', 'IndikatorController@create')->name('indikator.create');
Route::post('/indikator/add', 'IndikatorController@add')->name('indikator.add');
Route::get('/indikator/detail/{id}', 'IndikatorController@detail')->name('indikator.detail');
Route::get('/indikator/edit/{id}', 'IndikatorController@update')->name('indikator.update');

Route::post('/indikator/skala/add/{id}', 'SkalaController@add')->name('skala.add');
Route::get('/indikator/skala/delete/{id}', 'SkalaController@delete')->name('skala.delete');


Route::get('/penguji', 'PengujiController@index')->name('penguji');
Route::get('/penguji/create', 'PengujiController@create')->name('penguji.create');
Route::post('/penguji/add', 'PengujiController@add')->name('penguji.add');
Route::get('/penguji/delete/{id}', 'PengujiController@delete')->name('penguji.delete');


Route::get('/login/penguji', 'Auth\LoginController@loginp')->name('login.penguji');
Route::post('/logout/penguji', 'Auth\LoginController@logout')->name('logout.penguji');
Route::post('/login/proses/penguji', 'Auth\LoginController@loginpost')->name('login.post.penguji');
Route::get('/home/penguji', 'PengujiController@home')->name('home.penguji');
Route::get('/home/penguji/tahap1', 'PengujiController@tahap1')->name('tahap1');
Route::get('/home/penguji/tahap1/{id}', 'PengujiController@tahap1_create')->name('tahap1.create');
Route::patch('/home/penguji/tahap1/{id}', 'PengujiController@tahap1_store')->name('tahap1.store');
Route::get('/home/penguji/tahap2', 'PengujiController@tahap2')->name('tahap2');
Route::get('/home/penguji/tahap2/{id}', 'PengujiController@tahap2_create')->name('tahap2.create');
Route::post('/home/penguji/add/2/{id}', 'PengujiController@tahap2_add')->name('tahap2.add');



//dinas


Route::get('/login/dinas', 'Auth\LoginController@logind')->name('login.dinas');
Route::post('/login/proses/dinas', 'Auth\LoginController@logindpost')->name('login.post.dinas');
Route::get('/home/dinas', 'DinasController@index')->name('home.dinas');
Route::get('/data/dinas', 'DinasController@dinas')->name('dinas');
Route::get('/dinas/create', 'DinasController@create')->name('dinas.create');
Route::post('/dinas/add', 'DinasController@add')->name('dinas.add');
Route::get('/dinas/delete/{id}', 'DinasController@delete')->name('dinas.delete');
