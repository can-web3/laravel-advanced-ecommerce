<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'full_name' => 'admin1',
                'password'  => 'admin1'
            ]
        );

        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        $user = User::firstOrCreate(
            ['email' => 'user1@gmail.com'],
            [
                'full_name' => 'user1',
                'password'  => 'qweqwe'
            ]
        );

        if (!$user->hasRole('customer')) {
            $user->assignRole('customer');
        }
    }
}
