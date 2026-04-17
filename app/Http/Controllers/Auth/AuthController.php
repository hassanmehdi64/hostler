<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    // ==================== Auth Pages ====================

    public function showRegisterForm(): View
    {
        return view('frontend.auth.register');
    }

    public function showLoginForm(): View
    {
        return view('frontend.auth.login');
    }

    public function profile(): View
    {
        $edituser = Auth::user();

        return view('admin.manager.profile-form', compact('edituser'));
    }

    // ==================== Auth Actions ====================

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $done = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => '',
            'address' => '',
            'password' => Hash::make($request->input('password')),
            'role' => 0,
            'status' => 0,
        ]);

        if ($done) {
            return redirect('/login');
        }

        return back()->with('message', 'Please Check Your Credentails ');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->status != 1) {
                Auth::logout();

                return redirect('/login')->with('message', 'Your account is not active yet.');
            }

            return redirect('/dashoard-home');
        }

        return redirect('/login');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect('/login');
    }
}
