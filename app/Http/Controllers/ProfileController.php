<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\SetCookieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function render(Request $request){
        if($request->cookie('authToken')){
            $loggedUser = true;
        }else{
            $loggedUser = false;
        }
        $data = $request->cookie();

        $avatarUrl = $data['avatarUrl'] ?? null;

        if($avatarUrl){
            $avatarUrl = base64_decode($data['avatarUrl']);
        }

        $cookies = $request->cookies->all();

        $response = Http::withCookies($cookies, 'auth_nginx')
            ->post('http://auth_nginx/api/returnUser');

        // dd($response->json());

        $data = $response->json();

        // $setCookieController = new SetCookieController();

        // // Создаём искусственный Request с нужными данными
        // $requestForCookie = new Request($data);

        // // Вызываем метод напрямую
        // $response = $setCookieController->setCookie($requestForCookie);

        // // Если нужно, получить JSON
        // $userData = $response->getData(true);

        // $cookies = $response->headers->getCookies();

        // $userData = [];

        // foreach ($cookies as $cookie) {
        //     $userData[$cookie->getName()] = base64_decode($cookie->getValue());
        // }

        // dd($data['tokenValue']);

        return view('profile', [
            'loggedUser' => $loggedUser,
            'avatarUrl' => $avatarUrl,
            'userData' => $data['tokenValue'],
        ]);
    }
}
