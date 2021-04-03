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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/category/{id}' , 'HomeController@byCategory')->name('by-category');

Route::get('/tag/{id}' , 'HomeController@byTag')->name('by-tag');

Route::get('/results/query' , 'HomeController@bySearch')->name('results');

Route::get('/{slug}' , 'HomeController@singlePost')->name('single-post');



Route::group(['as' => 'admin.','middleware' =>'auth' , 'prefix' => 'admin'] , function(){

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::post('/post/store', 'PostsController@store')->name('post.store');
    Route::get('/posts', 'PostsController@index')->name('post.index');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.destroy');
    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');
    Route::get('/post/disable/{id}', 'PostsController@disable')->name('post.disable');
    Route::get('/post/approve/{id}', 'PostsController@approve')->name('post.approve');


    Route::get('/tag/create', 'TagsController@create')->name('tag.create');
    Route::post('/tag/store', 'TagsController@store')->name('tag.store');
    Route::get('/tags', 'TagsController@index')->name('tag.index');
    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.destroy');
    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');


    Route::get('/user/create', 'UsersController@create')->name('user.create');
    Route::post('/user/store', 'UsersController@store')->name('user.store');
    Route::get('/users', 'UsersController@index')->name('user.index');
    Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.destroy');
    Route::post('/user/update/{id}', 'UsersController@update')->name('user.update');
    Route::get('/user/admin/{id}', 'UsersController@admin')->name('user.make-admin');
    Route::get('/user/default/{id}', 'UsersController@not_admin')->name('user.not-admin');
    
    Route::get('/user/profile', 'ProfilesController@index')->name('user.profile');
    Route::post('/user/profile/update/{id}', 'ProfilesController@update')->name('user.profile.update');

    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');
});

