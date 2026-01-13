<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetCookieController extends Controller
{
    public function setCookie(Request $request){
        // $token = $request->input('token');

        // dd($token);

        // return response()->json([
        //     'request' => $request
        // ]);

        $tokenValue = $request->input('tokenValue');
        $tokenName = $request->input('tokenName');

        if($tokenName !== 'authToken'){
            if (is_array($tokenValue) || is_object($tokenValue)) {
                $tokenValue = json_encode($tokenValue, JSON_UNESCAPED_UNICODE);
            }

            $tokenValue = base64_encode($tokenValue);
        }

        return response()->json([
            'message' => 'Кука установлена'
        ])->cookie($tokenName, $tokenValue, 60 * 24 * 30, '/', null, false, true);

    }
}
