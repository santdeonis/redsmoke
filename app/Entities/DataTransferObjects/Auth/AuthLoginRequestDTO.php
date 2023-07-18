<?php

namespace App\Entities\DataTransferObjects\Auth;

use Illuminate\Contracts\Support\Arrayable;

class AuthLoginRequestDTO implements Arrayable
{
    public function __construct(
        protected string $username,
        protected string $password,
        protected bool $remember,
    )
    {
    }

    public function toArray(): array
    {
        return [

        ];
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function isRemember(): bool
    {
        return $this->remember;
    }

    public function setRemember(bool $remember): void
    {
        $this->remember = $remember;
    }
}
