<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function __construct(
        protected readonly AuthService $authService
    )
    {
    }

    public function register(UserRegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = $this->authService->register($validatedData);

        if($user instanceof User){
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(
                [
                    'message' => 'User created successfully',
                    'access_token' => $token,
                ], 201);
        }

        return response()->json([
            'message' => 'Failed to register user',
        ],Response::HTTP_BAD_REQUEST);
    }

    public function login(UserLoginRequest $request)
    {
        $validatedData = $request->validated();

        if (!Auth::attempt($validatedData)) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        $token = Auth::user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}

