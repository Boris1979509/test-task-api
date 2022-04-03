<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

/**
 * Class UserController
 * @package App\Http\Controllers\Api\Auth
 */
class UserController extends BaseController
{
    /**
     * @param Request $request
     * @return UserResource|void
     */
    public function __invoke(Request $request)
    {
        if (!$request->user()) {
            return;
        }
        return new UserResource($request->user());
    }
}
