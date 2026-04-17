<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    // ==================== Settings Pages ====================

    public function show(): View
    {
        $settings = Settings::find(1);

        return view('admin.settings.index', compact('settings'));
    }

    // ==================== Settings Actions ====================

    public function update(Request $request): RedirectResponse
    {
        $settings = Settings::find(1);
        $logoPath = $settings?->logo;

        if ($request->hasFile('logo')) {
            $logoPath = $this->storeLogo($request->file('logo'));
        }

        Settings::where('id', 1)->update([
            'name' => $request->input('title'),
            'logo' => $logoPath,
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'facebook' => $request->input('facebook'),
            'linkedin' => $request->input('linkedin'),
            'twitter' => $request->input('twitter'),
            'phone' => $request->input('phone'),
        ]);

        return back()->with('message', 'Settings Updated');
    }

    // ==================== Internal Helpers ====================

    private function storeLogo($file): string
    {
        $fileName = $file->getClientOriginalName();
        $relativePath = 'logos/' . $fileName;
        $file->move(public_path('logos'), $fileName);

        return $relativePath;
    }
}
