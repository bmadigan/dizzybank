<?php

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    // Dash
    Route::get('/')->uses('DashboardController')->name('dashboard');

    // Accounts
    Route::get('accounts/{account}')->uses('AccountsController@show')->name('accounts.show');
    Route::post('accounts')->uses('AccountsController@store')->name('accounts.store');
    Route::patch('accounts/{account}')->uses('AccountsController@update')->name('accounts.update');

    // Download Transactions
    Route::get('download-transactions')->uses('TransactionsExportController')->name('export.transactions');
});
