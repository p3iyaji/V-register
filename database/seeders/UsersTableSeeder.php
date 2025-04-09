<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'id' => 1,
            'name' => 'Test User',
            'email' => 'admin@hunter.com',
            'password' => Hash::make('hunter123'),
            'role' => 'admin',
            'department_id' => 1,
            'is_active' => true,
            'email_verified_at' => now(),
        ];

        User::insert($user);
    }
}
