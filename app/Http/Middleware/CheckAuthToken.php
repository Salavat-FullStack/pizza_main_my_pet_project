<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('authToken');

        if (!$token) {
            return redirect('/login');
        }

        // Отправляем токен на микросервис для проверки
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$token}"
        ])->post('http://auth_nginx/api/me');

        if ($response->status() !== 200) {
            return redirect('/login');
        }

        // $request->attributes->set('isLogged', true);
        // $request->attributes->set('user', $response->json('user'));

        // $request->merge([
        //     'user' =>  $response->json('user'),
        //     'isLogged' => true,
        // ]);

        // dd($response->json('user'));

        // view()->share('loggedUser', $response->json('user'));
        // view()->share('isLogged', true);

        return $next($request);
    }
}