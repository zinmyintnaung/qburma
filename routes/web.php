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

Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    
    Route::get('/home', [
        'uses'=>'HomeController@index',
        'as'=>'home'
    ]);

    Route::get('/languages', [
        'uses' => 'LanguagesController@index',
        'as'=>'languages'
    ]);

    Route::get('/language/create', [
        'uses' => 'LanguagesController@create',
        'as'=>'language.create'
    ]);

    Route::post('/language/store', [
        'uses' => 'LanguagesController@store',
        'as'=>'language.store'
    ]);

    Route::get('/language/edit/{id}', [
        'uses' => 'LanguagesController@edit',
        'as'=>'language.edit'
    ]);

    Route::post('/language/update/{id}', [
        'uses' => 'LanguagesController@update',
        'as'=>'language.update'
    ]);

    Route::get('/language/delete/{id}', [
        'uses' => 'LanguagesController@destroy',
        'as'=>'language.delete'
    ]);

    Route::get('/language/kill/{id}', [
        'uses' => 'LanguagesController@kill',
        'as'=>'language.kill'
    ]);

    Route::get('/suras', [
        'uses' => 'SurasController@index',
        'as'=>'suras'
    ]);

    Route::get('/sura/create', [
        'uses' => 'SurasController@create',
        'as'=>'sura.create'
    ]);

    Route::post('/sura/store', [
        'uses' => 'SurasController@store',
        'as'=>'sura.store'
    ]);
    
});