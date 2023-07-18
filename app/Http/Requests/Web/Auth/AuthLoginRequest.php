<?php

namespace App\Http\Requests\Web\Auth;

use App\Entities\DataTransferObjects\Auth\AuthLoginRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'remember' => $this->boolean('remember'),
        ]);
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'remember' => ['required', 'boolean'],
        ];
    }

    public function getData(): AuthLoginRequestDTO
    {
        $validated = parent::validated();

        return new AuthLoginRequestDTO(
            $validated['username'],
            $validated['password'],
            $validated['remember']
        );
    }
}
