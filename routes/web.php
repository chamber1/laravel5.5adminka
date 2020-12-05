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
    
    //ENTITY TEST
    Route::get('test', 'Admin\TestController@index')->name('admin.test');
    Route::get('test/data', 'Admin\TestController@data')->name('admin.test.data');
    
    //Test CRUD operations
    Route::group(['prefix' => 'test'], function () {
        
        Route::get('create', 'Admin\TestController@create')->name('admin.test.create');
        Route::post('store', 'Admin\TestController@store')->name('admin.test.store');
        Route::get('{test}/edit', 'Admin\TestController@edit')->name('admin.test.edit');
        Route::post('{test}/update', 'Admin\TestController@update')->name('admin.test.update');
        Route::get('{test}/confirm-delete', 'Admin\TestController@getModalDelete')->name('test.confirm.delete');
        Route::get('{test}/delete', 'Admin\TestController@destroy')->name('admin.test.delete');
       
    });
    
    
});
