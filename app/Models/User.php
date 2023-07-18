<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use App\Traits\Models\ApplicationAccessList;
use Carbon\Carbon;
use Eloquent;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property int $role
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $phone
 * @property string $photo
 * @property string $password
 *
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $deleted_at
 *
 * @mixin Eloquent
 */
class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens,
        Notifiable,
        SoftDeletes,
        ApplicationAccessList;

    protected $fillable = [
        'name',
        'role',
        'email',
        'phone',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'role' => UserRoleEnum::USER,
    ];

    public function canAccessFilament(): bool
    {
        return $this->authAdmin();
    }

    public function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
