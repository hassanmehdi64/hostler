<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Hostels;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HostelManagerController extends Controller
{
    // ==================== Manager Pages ====================

    public function profile(): View
    {
        return view('admin.manager.profile', ['user' => Auth::user()]);
    }

    public function create(): View
    {
        return view('admin.manager.create');
    }

    public function showHostel(): View|RedirectResponse
    {
        $hostel = Hostels::where('user_id', Auth::id())->first();

        if (!$hostel) {
            return back()->with('message', 'Not Found');
        }

        return view('admin.hostels.edit', compact('hostel'));
    }

    public function edit(int $id): View
    {
        return view('admin.manager.edit', ['hostel' => Hostels::findOrFail($id)]);
    }
}
