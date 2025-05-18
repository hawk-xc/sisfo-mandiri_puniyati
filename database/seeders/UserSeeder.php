<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\PasswordService;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Str::random(rand(1, 9));

        // \App\Models\User::factory()
        $admin = User::create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('password'),
            'raw_password' => PasswordService::encrypt('password'),
        ]);
    }
}
