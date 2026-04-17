<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@hostler.com',
        ], [
            'name' => 'Admin',
            'email_verified_at' => now(),
            'image' => 'image/profile.png',
            'password' => Hash::make('admin123'),
            'phone' => '03001234567',
            'address' => 'Gilgit',
            'role' => 1,
            'status' => 1,
        ]);
    }
}

