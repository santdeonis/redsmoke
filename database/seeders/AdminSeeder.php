<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin',
            'password' => 'password',
            'phone' => '+7 999 999 9999',
            'role' => UserRoleEnum::ADMIN,
        ]);
    }
}
