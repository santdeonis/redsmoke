<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const SEEDERS = [
        AdminSeeder::class => 'Admin has been successfully created!',
    ];

    public function run()
    {
        foreach (self::SEEDERS as $seeder => $message) {
            $this->call($seeder);
            $this->command->info($message);
        }
    }
}
