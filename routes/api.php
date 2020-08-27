<?php

use Illuminate\Support\Facades\Route;

Route::post('/create-user', 'Api\V1\UserController@create');
