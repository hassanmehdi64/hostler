<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\profileDetails;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    // ==================== Profile Pages ====================

    public function show(): View
    {
        $user = Auth::user();

        return view('admin.manager.profile-form', compact('user'));
    }

    public function indexUsers(): View
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function edit(int $id, string $name): View
    {
        $edituser = User::findOrFail($id);

        return view('admin.manager.profile-form', compact('edituser'));
    }

    // ==================== Profile Actions ====================

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required|file|mimes:png,jpg',
        ]);

        $imagePath = $this->storeImage($request->file('image'));

        profileDetails::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'profile_image' => $imagePath,
        ]);

        return back()->with('message', 'Profile Updated Successfuly.');
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $thename = 'image not  set ';

        if ($request->hasFile('image')) {
            $thename = $this->storeImage($request->file('image'));
        }

        $user = User::findOrFail($id);

        $payload = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'image' => $thename,
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];

        if ($user->role != 0) {
            $payload['status'] = $request->input('status');
            $payload['role'] = $request->input('role');
        }

        $user->update($payload);

        return redirect(route('users'))->with('message', 'updated ');
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        if ($user->role == 1) {
            return redirect(route('users'))->with('message', 'Cannot Delete Admin ');
        }

        User::destroy($id);

        return redirect(route('users'))->with('message', 'Deleted Succesfuly ');
    }

    // ==================== Internal Helpers ====================

    private function storeImage($file): string
    {
        $fileName = $file->getClientOriginalName();
        $relativePath = 'images/' . $fileName;
        $file->move(public_path('images'), $fileName);

        return $relativePath;
    }
}
