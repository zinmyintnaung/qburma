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
    /*
    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as'=>'post.create'
    ]);

    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as'=>'posts'
    ]);
    
    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as'=>'post.store'
    ]);

    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as'=>'post.delete'
    ]);

    Route::get('/post/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as'=>'post.kill'
    ]);

    Route::get('/post/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as'=>'post.restore'
    ]);

    Route::get('/post/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as'=>'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as'=>'post.update'
    ]);

    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as'=>'posts.trashed'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as'=>'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as'=>'category.store'
    ]);

    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as'=>'categories'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as'=>'category.edit'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as'=>'category.update'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as'=>'category.delete'
    ]);

    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as'=>'tags'
    ]);
    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as'=>'tag.create'
    ]);
    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as'=>'tag.store'
    ]);
    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as'=>'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as'=>'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as'=>'tag.delete'
    ]);
    */
});