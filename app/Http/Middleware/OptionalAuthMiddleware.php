<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class OptionalAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, есть ли токен в заголовке Authorization
        if ($token = $request->bearerToken()) {
            $accessToken = PersonalAccessToken::findToken($token);

            // Если токен найден, устанавливаем пользователя в контекст запроса
            if ($accessToken) {
                Auth::setUser($accessToken->tokenable);
            }
        }

        return $next($request);
    }

}
