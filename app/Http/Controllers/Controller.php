<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function throwIfValidationFails(Validator $validator)
    {
        if ($validator->fails()) {
            return response()->json(['message' => 'validation error'], 401);
        }
    }
}
