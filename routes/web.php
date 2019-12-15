<?php

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    // Dash
    Route::get('/')->uses('DashboardController')->name('dashboard');

    // Accounts
    Route::get('accounts/{account}')->uses('AccountsController@show')->name('accounts.show');
    Route::post('accounts')->uses('AccountsController@store')->name('accounts.store');
    Route::post('articles', '\App\Domain\Accounts\Actions\CreateNewAccountAction');

    // Test / Delete this
    Route::get('test')->uses('AccountController@index');
});
