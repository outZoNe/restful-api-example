<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;

class ApiController extends Controller
{
    protected $model;

    public function add(ApiRequest $request)
    {
        $data = $request->validated();
        $res = $this->model->create($data);

        return response()->json([
            'id' => $res->id
        ], 200);
    }
}
