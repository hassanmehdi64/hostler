<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class SetupController extends Controller
{
    // ==================== Bootstrap Utilities ====================

    public function seedDefaults(): Response
    {
        Settings::create([
            'name' => 'name',
            'logo' => 'logo',
            'email' => 'email',
            'description' => 'description',
            'facebook' => 'facebook',
            'linkedin' => 'linkedin',
            'twitter' => 'twitter',
            'phone' => 'phone',
        ]);

        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('test'),
            'phone' => 'phone',
            'address' => 'address',
            'role' => 1,
            'status' => 1,
        ]);

        return response('Default data created.');
    }
}
