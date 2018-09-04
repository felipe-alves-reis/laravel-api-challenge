<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $credentials = $this->credentials($request);

        $token = JWTAuth::attempt($credentials);

        return $token ? ['token' => $token] : response()->json(['error' => \Lang::get('auth.failed')], 400);
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        return response()->json([], 204);
    }

    public function userLogged()
    {
        $user = Auth::guard('api')->user();
        return new UserResource($user);
    }

    public function refreshToken()
    {
        $token = Auth::guard('api')->refresh();
        return ['token' => $token];
    }

    public function username()
    {
        return 'username';
    }
}
