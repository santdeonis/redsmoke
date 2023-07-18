<?php

namespace App\Http\Requests\Web\Users;

use App\Entities\DataTransferObjects\Auth\AuthLoginRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'phone' => ['string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string'],
            'passwordConfirm' => ['required', 'string'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated();
        unset($validated['passwordConfirm']);

        return $validated;
    }
}
