<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Psy\Exception\RuntimeException;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Api\Auth
 */
class RegisterController
{
    /**
     * Register
     * @param RegisterRequest $request
     * @return JsonResponse|void
     */
    public function register(RegisterRequest $request)
    {
        try {
            $userData = $request->only('name', 'email', 'password');
            $user = User::register($userData);
            if ($user) {
                return response()->json(
                    [
                        'status'  => 'success',
                        'message' => trans('auth.RegistrationHasBeenSuccessfullyCompleted'),
                    ], 201
                );
            }
        } catch (RuntimeException $error) {
            Log::error($error);
        }
    }
}
