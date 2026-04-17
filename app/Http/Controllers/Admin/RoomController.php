<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomSystem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomController extends Controller
{
    // ==================== Room Pages ====================

    public function create(int $id, string $name): View
    {
        $hostels_id = $id;

        return view('admin.rooms.create', compact('hostels_id'));
    }

    public function index(int $id): View
    {
        $rooms = RoomSystem::where('hostels_id', $id)->get();

        return view('admin.rooms.index', compact('rooms'));
    }

    // ==================== Room Actions ====================

    public function store(Request $request, int $id): RedirectResponse
    {
        $imagePath = '';

        if ($request->hasFile('image')) {
            $imagePath = $this->storeImage($request->file('image'), 'roomimages/');
        }

        RoomSystem::create([
            'name' => $request->input('name'),
            'num' => $request->input('num'),
            'image' => $imagePath,
            'hostels_id' => $id,
        ]);

        return back()->with('message', 'New Room Added Successfully');
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
