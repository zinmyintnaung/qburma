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

    //Suras start
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
    
    Route::get('/sura/edit/{id}', [
        'uses' => 'SurasController@edit',
        'as'=>'sura.edit'
    ]);

    Route::post('/sura/update/{id}', [
        'uses' => 'SurasController@update',
        'as'=>'sura.update'
    ]);

    Route::get('/suras/trashed', [
        'uses' => 'SurasController@trashed',
        'as'=>'suras.trashed'
    ]);

    Route::get('/sura/delete/{id}', [
        'uses' => 'SurasController@destroy',
        'as'=>'sura.delete'
    ]);

    Route::get('/sura/kill/{id}', [
        'uses' => 'SurasController@kill',
        'as'=>'sura.kill'
    ]); //Suras end
    
    Route::get('/suratexts', [
        'uses' => 'SuraTextsController@index',
        'as'=>'suratexts'
    ]);

    Route::get('/suratext/create', [
        'uses' => 'SuraTextsController@create',
        'as'=>'suratext.create'
    ]);

    Route::post('/suratext/store', [
        'uses' => 'SuraTextsController@store',
        'as'=>'suratext.store'
    ]);
    Route::get('/suratext/edit/{id}', [
        'uses' => 'SuraTextsController@edit',
        'as'=>'suratext.edit'
    ]);

    Route::post('/suratext/update/{id}', [
        'uses' => 'SuraTextsController@update',
        'as'=>'suratext.update'
    ]);

    Route::get('/suratexts/trashed', [
        'uses' => 'SuraTextsController@trashed',
        'as'=>'suratexts.trashed'
    ]);

    Route::get('/suratext/delete/{id}', [
        'uses' => 'SuraTextsController@destroy',
        'as'=>'suratext.delete'
    ]);

    Route::get('/suratext/kill/{id}', [
        'uses' => 'SuraTextsController@kill',
        'as'=>'suratext.kill'
    ]); //Sura Text ended
    
    Route::get('/explanationdetails', [
        'uses' => 'ExplanationDetailsController@index',
        'as'=>'explanationdetails'
    ]);
    
    Route::get('/explanationdetail/create', [
        'uses' => 'ExplanationDetailsController@create',
        'as'=>'explanationdetail.create'
    ]);

    Route::post('/explanationdetail/store', [
        'uses' => 'ExplanationDetailsController@store',
        'as'=>'explanationdetail.store'
    ]);
    Route::get('/explanationdetail/edit/{id}', [
        'uses' => 'ExplanationDetailsController@edit',
        'as'=>'explanationdetail.edit'
    ]);

    Route::post('/explanationdetail/update/{id}', [
        'uses' => 'ExplanationDetailsController@update',
        'as'=>'explanationdetail.update'
    ]);

    Route::get('/explanationdetails/trashed', [
        'uses' => 'ExplanationDetailsController@trashed',
        'as'=>'explanationdetails.trashed'
    ]);

    Route::get('/explanationdetail/delete/{id}', [
        'uses' => 'ExplanationDetailsController@destroy',
        'as'=>'explanationdetail.delete'
    ]);

    Route::get('/explanationdetail/kill/{id}', [
        'uses' => 'ExplanationDetailsController@kill',
        'as'=>'explanationdetail.kill'
    ]);
    //Explain Detail delete edit to add here

});