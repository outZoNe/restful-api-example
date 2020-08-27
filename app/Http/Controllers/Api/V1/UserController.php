<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CreateUserRequest;

class UserController extends ApiController
{
    public function create(CreateUserRequest $request)
    {
        return parent::add($request);
    }
}
