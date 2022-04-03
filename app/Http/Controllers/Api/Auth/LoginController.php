<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Api\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

/**
 * Class LoginController
 * @package App\Http\Controllers\Api\Auth
 */
class LoginController
{
    /**
     * Login
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'password' => trans('auth.invalidUsernameOrPassword'),
            ]);
        }
        $request->session()->regenerate();

        return response()->json(
            [
                'status'  => 'success',
                'message' => trans('auth.youHaveSuccessfullyLoggedIn')
            ],
            200
        );
    }

    /**
     * Logout
     * @param Request $request
     * @return JsonResponse|void
     */
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json(
                [
                    'status'  => 'success',
                    'message' => trans('auth.youHaveSuccessfullyLoggedOut')
                ]
            );
        } catch (\Exception $error) {
            Log::error($error);
        }
    }
}
