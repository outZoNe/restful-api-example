<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CreateUserRequest;
use App\User;

class UserController extends ApiController
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(CreateUserRequest $request)
    {
        return parent::add($request);
    }
}
