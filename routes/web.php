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

//Auth::routes();

Route::get('/{lang?}', function () {
        return view('welcome');
});

Route::get('/home/{lang?}', 'HomeController@index')->name('home');


#BackEnd
Route::group(['prefix' => 'admin'],function () {

    
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    
   
    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    
    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    
    //ENTITY POST
    Route::get('post', 'Admin\PostController@index')->name('admin.post');
    Route::get('post/data', 'Admin\PostController@data')->name('admin.post.data');
    
    //Test CRUD operations
    Route::group(['prefix' => 'post'], function () {
        
        Route::get('create', 'Admin\PostController@create')->name('admin.post.create');
        Route::post('store', 'Admin\PostController@store')->name('admin.post.store');
        Route::get('{post}/edit', 'Admin\PostController@edit')->name('admin.post.edit');
        Route::post('{post}/update', 'Admin\PostController@update')->name('admin.post.update');
        Route::get('{post}/confirm-delete', 'Admin\PostController@getModalDelete')->name('post.confirm.delete');
        Route::get('{post}/delete', 'Admin\PostController@destroy')->name('admin.post.delete');
       
    });
    
    
});
