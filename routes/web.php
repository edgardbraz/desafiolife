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
    return redirect(route('pessoas.index'));
});

Route::prefix('pessoas')->group(function() {
    Route::post('/', 'PessoaController@store')->name('pessoas.create');
    Route::get('/', 'PessoaController@index')->name('pessoas.index');
    Route::get('/edit/{id}', 'PessoaController@edit')->name('pessoas.edit');
    Route::put('/{id}', 'PessoaController@update')->name('pessoas.update');
    Route::delete('/{id}', 'PessoaController@destroy')->name('pessoas.destroy');
});
