<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Requests\LoginRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    /**
     * login to api
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        $tokenResult = $request->user()->createToken('maktabgram');
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
}
