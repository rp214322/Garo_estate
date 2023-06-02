<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
        	'first_name' => 'Administrator',
            'last_name' => '',
        	'email' => 'admin@example.com',
            'password' => bcrypt('example@2023#'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
