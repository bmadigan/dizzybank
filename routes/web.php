<?php

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    // Dash
    Route::get('/')->uses('DashboardController')->name('dashboard');

    Route::get('/accounts')->uses('AccountsController@show')->name('accounts.show');

    Route::get('/test')->uses('AccountController@index');
});
