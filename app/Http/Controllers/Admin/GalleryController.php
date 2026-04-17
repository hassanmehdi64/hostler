<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Hostels;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GalleryController extends Controller
{
    // ==================== Gallery Pages ====================

    public function create(int $id, string $name): View
    {
        $allgalleries = Gallery::all();
        $hostel = Hostels::findOrFail($id);

        return view('admin.galleries.create', compact('allgalleries', 'hostel'));
    }

    public function index(): View
    {
        $allgalleries = Gallery::all();

        return view('admin.galleries.index', compact('allgalleries'));
    }

    public function edit(int $id): View
    {
        $gallaries = Gallery::findOrFail($id);

        return view('admin.galleries.edit', compact('gallaries'));
    }

    public function hostelGallery(int $id, string $name): View
    {
        $gallaries = Gallery::where('hostel_id', $id)->get();

        return view('admin.galleries.hostel-index', compact('gallaries'));
    }

    // ==================== Gallery Actions ====================

    public function store(Request $request, int $id): RedirectResponse
    {
        $storeimages = [
            'hostelName' => $request->input('hostelName'),
            'location' => $request->input('location'),
            'category' => $request->input('category'),
            'hostel_id' => $id,
        ];

        if ($request->hasFile('imageFiles')) {
            $storeimages['imageFiles'] = json_encode($this->storeGalleryImages($request->file('imageFiles')));
            Gallery::create($storeimages);
        }

        if (Auth::user()->role == 1) {
            return redirect()->route('view-galleries')->with('messageupdate', 'Gallery Added Successfully');
        }

        return redirect()->route('showhostel')->with('messageupdate', 'Gallery Added Successfully');
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $request->validate([
            'hostelName' => 'required',
            'location' => 'required',
            'imageFiles.*' => 'nullable|image',
        ]);

        $gallery = Gallery::findOrFail($id);
        $updateData = [
            'hostelName' => $request->input('hostelName'),
            'location' => $request->input('location'),
        ];

        if ($request->hasFile('imageFiles')) {
            $updateData['imageFiles'] = json_encode($this->storeGalleryImages($request->file('imageFiles')));
        }

        $gallery->update($updateData);

        return redirect()->route('view-galleries')->with('messageupdate', 'Gallery Updated Successfully');
    }

    public function destroy(): RedirectResponse
    {
        Gallery::destroy(request('id'));

        return back()->with('deletemessage', 'Gallary Deleted Sucessfully');
    }

    // ==================== Internal Helpers ====================

    private function storeGalleryImages(array $imageFiles): array
    {
        $imagePaths = [];

        foreach ($imageFiles as $image) {
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('Gallaries'), $fileName);
            $imagePaths[] = $fileName;
        }

        return $imagePaths;
    }
}
