<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostels;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HostelController extends Controller
{
    // ==================== Hostel Pages ====================

    public function edit(): View
    {
        $hostel = Hostels::findOrFail(request('id'));

        return view('admin.hostels.edit', compact('hostel'));
    }

    // ==================== Hostel Actions ====================

    public function update(Request $request): RedirectResponse
    {
        $hostel = Hostels::findOrFail($request->id);
        $imagePath = $hostel->hostel_image;

        if ($request->hasFile('hostel_image')) {
            $imagePath = $this->storeImage($request->file('hostel_image'), 'hostels/');
        }

        $hostel->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'hostel_manager_name' => $request->input('hostel_manager_name'),
            'phone' => $request->input('phone'),
            'mobile_number' => $request->input('mobile_number'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'hostel_rent' => $request->input('hostel_rent'),
            'hostel_image' => $imagePath,
        ]);

        return redirect(route('hostels-list'))->with('message', 'Updated Successfuy');
    }

    public function destroy(): RedirectResponse
    {
        Hostels::destroy(request('id'));

        return back()->with('deletemessage', 'Hostel Deleted Successfully');
    }

    // ==================== Internal Helpers ====================

    private function storeImage($file, string $directory): string
    {
        $fileName = $file->getClientOriginalName();
        $relativePath = $directory . $fileName;
        $file->move(public_path($directory), $fileName);

        return $relativePath;
    }
}
