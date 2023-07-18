<?php

namespace App\Enums;

use App\Enums\Abstr\DictionaryEnum;

final class UserRoleEnum extends DictionaryEnum
{
    const ADMIN = 1;
    const USER = 2;

    const ROLES = [
        self::ADMIN => 'enum.user_role.admin',
        self::USER => 'enum.user_role.user',
    ];

    protected static array $enumItems = self::ROLES;
}
