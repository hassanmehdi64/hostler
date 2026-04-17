<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostels;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    // ==================== User Pages ====================

    public function index(): View|RedirectResponse
    {
        if (Auth::user()->role != 1) {
            return back();
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function userHostels(): View
    {
        $hostele = Hostels::where('user_id', Auth::id())->get();

        return view('admin.hostels.user-index', compact('hostele'));
    }

    // ==================== User Actions ====================

    public function updateStatus(int $id): RedirectResponse
    {
        User::where('id', $id)->update([
            'status' => request('status'),
        ]);

        return back()->with('message', 'User Updated Successfully');
    }
}
