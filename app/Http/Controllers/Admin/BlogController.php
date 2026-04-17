<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    // ==================== Blog Pages ====================

    public function create(): View
    {
        return view('admin.blogs.create');
    }

    public function index(): View
    {
        $blogs = Blog::all();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function edit(): View
    {
        $blog = Blog::findOrFail(request('id'));

        return view('admin.blogs.edit', compact('blog'));
    }

    // ==================== Blog Actions ====================

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publish_date' => 'required|date',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $this->storeImage($request->file('image'), 'blog/');

        Blog::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publish_date' => $request->input('publish_date'),
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);

        return redirect(route('view_blog'))->with('message', 'Blog Added Successfuly.');
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publish_date' => 'required|date',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $blog = Blog::findOrFail($id);
        $imagePath = $blog->image;

        if ($request->hasFile('image')) {
            $imagePath = $this->storeImage($request->file('image'), 'blog/');
        }

        $blog->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publish_date' => $request->input('publish_date'),
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);

        return back()->with('message', 'Blog Updated Successfully');
    }

    public function destroy(): RedirectResponse
    {
        Blog::destroy(request('id'));

        return back()->with('deletemessage', 'Blog Deleted Sucessfully');
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
