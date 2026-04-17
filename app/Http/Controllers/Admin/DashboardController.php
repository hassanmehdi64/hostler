<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Hostels;
use App\Models\RoomSystem;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    // ==================== Dashboard Pages ====================

    public function home(): View
    {
        if (Auth::user()->role != 1) {
            $hostel = Hostels::where('user_id', Auth::id())->get();

            return view('admin.manager.index', compact('hostel'));
        }

        $stats = [
            'hostels' => Hostels::count(),
            'rooms' => RoomSystem::count(),
            'blogs' => Blog::count(),
            'galleries' => Gallery::count(),
            'messages' => ContactUs::count(),
            'feedbacks' => Feedback::count(),
            'users' => User::count(),
        ];

        $recentHostels = Hostels::latest()->limit(5)->get();
        $recentMessages = ContactUs::latest()->limit(5)->get();

        return view('admin.dashboard.index', compact('stats', 'recentHostels', 'recentMessages'));
    }

    public function createHostelForm(): View|RedirectResponse
    {
        $guardResponse = $this->guardHostelCreation();

        if ($guardResponse) {
            return $guardResponse;
        }

        $addhostel = 'add hostel';

        return view('admin.hostels.create', compact('addhostel'));
    }

    public function listHostels(): View
    {
        $hostels = Hostels::all();

        return view('admin.hostels.index', compact('hostels'));
    }

    public function cms(): View
    {
        return view('admin.cms.index');
    }

    // ==================== Hostel Actions ====================

    public function storeHostel(Request $request): RedirectResponse
    {
        $guardResponse = $this->guardHostelCreation();

        if ($guardResponse) {
            return $guardResponse;
        }

        $request->validate([
            'email' => 'required|unique:hostels',
            'name' => 'required',
            'location' => 'required',
            'hostel_manager_name' => 'required',
            'phone' => 'required',
            'mobile_number' => 'required',
            'gender' => 'required',
            'hostel_rent' => 'required',
            'hostel_image' => 'required|image',
        ]);

        $imagePath = $this->storeImage($request->file('hostel_image'), 'hostels/');

        Hostels::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'hostel_manager_name' => $request->input('hostel_manager_name'),
            'phone' => $request->input('phone'),
            'mobile_number' => $request->input('mobile_number'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'hostel_rent' => $request->input('hostel_rent'),
            'hostel_image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return back()->with('message', 'New Hostel added successfully');
    }

    // ==================== Internal Helpers ====================

    private function guardHostelCreation(): ?RedirectResponse
    {
        $user = Auth::user();

        if ($user->role == 0 && $user->status == 1) {
            $found = Hostels::where('user_id', $user->id)->first();

            if ($found) {
                return redirect(route('dashboard_home'))->with('message', 'Hostel Exist Go To Edit Section');
            }
        }

        if ($user->role == 0 && $user->status == 0) {
            return back()->with('message', 'You Account is not Active Yet');
        }

        if ($user->role == 1 && $user->status == 0) {
            return back()->with('message', 'You are Not Active Admin');
        }

        return null;
    }

    private function storeImage($file, string $directory): string
    {
        $fileName = $file->getClientOriginalName();
        $relativePath = $directory . $fileName;
        $file->move(public_path($directory), $fileName);

        return $relativePath;
    }
}
