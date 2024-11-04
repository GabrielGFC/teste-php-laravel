<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;


class AuthController extends Controller
{
    protected $TokenRepository;

    public function __construct(TokenRepository $TokenRepository)
    {
        $this->TokenRepository = $TokenRepository;
    }

    public function login(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

            $user = auth()->user();
            $user->tokens = $user->createToken($user->email)->accessToken;
            return ["status" => 200, 'message' => 'Logado com sucesso!', "user" => $user];

        } else {
            return ["status" => 404, 'message' => 'Usuário ou senha incorreto'];
        }
    }


}

