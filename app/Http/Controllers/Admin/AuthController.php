<?php

namespace App\Http\Controllers\Admin;

use App\Domain\AuthDomain;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //

    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $credentials = $request->only('name','email', 'password');

        if (! $token = auth($this->guard)->attempt($credentials)) {
//        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserInfo()
    {
//        $auth = new AuthDomain($this->guard);
//        $user = $auth->getUserInfo();
//        $user = JWTAuth::parseToken()->touser();
        $user = auth($this->guard)->user();
//        $user = auth($this->guard)->touser();
//        $payload = auth($this->guard)->getPayload();
//        $payload = JWTAuth::parseToken()->getPayload();
//        $user2 = auth($this->guard)->payload();
//        $user2 = auth('user')->invalidate();
        return response()->json($user);
//        return response()->json(JWTAuth::parseToken()->authenticate());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth($this->guard)->invalidate();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::parseToken()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    public function username()
    {
        return 'name';
    }

    public function guard($guard)
    {
        return Auth::guard($guard);
    }
}
