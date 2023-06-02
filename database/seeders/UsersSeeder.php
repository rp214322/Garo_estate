<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        User::factory(10)->create();
    }
}
