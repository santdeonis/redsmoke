<?php

namespace App\Traits\Models;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder admins()
 * @method static Builder users()
 */
trait ApplicationAccessList
{
    protected array $adminAccessList = [
        UserRoleEnum::ADMIN,
    ];

    protected array $webAccessList = [
        UserRoleEnum::ADMIN,
        UserRoleEnum::USER,
    ];

    public function authAdmin(): bool
    {
        return $this->roleIn($this->adminAccessList);
    }

    public function authWeb(): bool
    {
        return $this->roleIn($this->webAccessList);
    }

    public function roleIn($roles): bool
    {
        return is_array($roles)
            ? in_array($this->role, $roles)
            : $this->role === $roles;
    }

    public function scopeAdmins(Builder $b): Builder
    {
        return $b->where(['role' => UserRoleEnum::ADMIN]);
    }

    public function scopeUsers(Builder $b): Builder
    {
        return $b->where(['role' => UserRoleEnum::USER]);
    }
}
