<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class RegisterPizzaController extends Controller
{
    public function returnView(Request $request) : View {
        $token = $request->cookie('authToken');
        $user_id = Redis::get("pizza_auth:user_token:{$token}");
        $data = Redis::lrange("pizza_auth:user_id:{$user_id}:cart", 0, -1);

        $decodedData = array_map(function($item) {
            return json_decode($item, true);
        }, $data);

        // dd($decodedData);

        if($request->cookie('authToken')){
            $loggedUser = true;
        }else{
            $loggedUser = false;
        }

        return view('registr_pizza', [
            'data' => $decodedData,
            'loggedUser' => $loggedUser
        ]);
    }
}
