<?php

namespace App\Services;

use App\Repositories\EloquentUserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthService
{
    public function __construct(
        protected readonly EloquentUserRepository $userRepository
    )
    {
    }

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }
}
