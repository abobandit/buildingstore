<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Регистрация нового пользователя.
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->authService->register($request->validated());
        return response()->json(['message' => 'User registered successfully'], 201);
    }

    /**
     * Авторизация пользователя.
     */
    public function login(LoginRequest $request)
    {
        $token = $this->authService->login($request->validated());
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * Выход пользователя.
     */
    public function logout(Request $request)
    {
        $this->authService->logout($request->user());
        return response()->json(['message' => 'Logged out successfully']);
    }

    /**
     * Получение профиля текущего пользователя.
     */
    public function profile(Request $request)
    {
        return response()->json($this->authService->profile($request->user()));
    }
}
