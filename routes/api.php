<?php

use Illuminate\Support\Facades\Route;

Route::prefix('create')->group(function () {
    // создание пользователя
    Route::post('user', 'Api\V1\UserController@create');

    // создание транзакции
    Route::post('transaction', 'Api\V1\TransactionController@create');
});

Route::prefix('get-transactions')->group(function () {
    // получаение всех транзакций пользователя
    Route::get('user', 'Api\V1\UserController@get');

    // получение транзакций всех пользователей за определенную дату
    Route::get('date', 'Api\V1\TransactionController@get');
});
