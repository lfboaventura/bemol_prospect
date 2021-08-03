<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->all())) {
            return response()->json([
                'status' => false,
                'message' => 'Login inválido!',
            ], 403);
        }

        $user = auth()->user();
        $user->person;
        $user->token = $user->createToken($user->email)->accessToken;
        return response()->json([
            'status' => true,
            'message' => 'Login realizado com sucesso!',
            'user' => $user,
        ]);
    }

    public function logout(){
        auth('api')->logout;
        return response()->json(['msg' => 'Logout foi realizado com sucesso!']);
    }

}
