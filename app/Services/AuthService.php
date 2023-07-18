<?php

namespace App\Services;

use App\Entities\DataTransferObjects\Auth\AuthLoginRequestDTO;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AuthService
{
    public static function login(AuthLoginRequestDTO $dto): bool
    {
        $data = [
            'username' => $dto->getUsername(),
            'password' => $dto->getPassword(),
        ];

        return Auth::guard('web')->attempt($data, $dto->isRemember());
    }

    public static function logout(): bool
    {
        try {
            Auth::guard('web')->logout();
            return true;
        } catch (Throwable) {
            return false;
        }
    }
}
