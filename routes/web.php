<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => 'can:admin'], function () {
        Route::resource('user', 'UserController');
    });

    Route::resource('profile', 'ProfileController')
        ->only('show');
    Route::resource('product', 'ProductController');
    Route::resource('client', 'ClientController');
    Route::resource('order', 'OrderController');
    Route::put('order/{order}/change-status', 'OrderController@changeStatus')
        ->name('order.change-status');

    Route::group(['as' => 'statistic.', 'prefix' => 'statistic', 'namespace' => 'Statistic'], function () {
        Route::group(['as' => 'client.', 'prefix' => 'client'], function () {
            Route::get('/', 'ClientController@index')
                ->name('index');
        });
    });

    Route::get('todo', function () {
        return view('todo');
    })->name('todo');

}); // middleware => auth

Route::group(['as' => 'page.', 'prefix' => 'page'], function () {
    Route::get('products', 'PageController@products')
        ->name('products');
});
