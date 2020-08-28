<?php

use Illuminate\Support\Facades\Route;

Route::post('/create-user', 'Api\V1\UserController@create');
Route::post('/create-transaction', 'Api\V1\TransactionController@create');
