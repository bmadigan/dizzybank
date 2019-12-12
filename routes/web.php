<?php

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    // Dash
    Route::get('/')->uses('DashboardController')->name('dashboard');

    // Accounts
    Route::get('accounts')->uses('AccountsController@show')->name('accounts.show');
    Route::post('articles', '\App\Domain\Accounts\Actions\CreateNewAccountAction');

    // Test / Delete this
    Route::get('test')->uses('AccountController@index');
});
