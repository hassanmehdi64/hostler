<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Hostels;
use App\Models\RoomSystem;
use App\Models\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HostelsViewController extends Controller
{
    // ==================== Public Pages ====================

    public function index(): View
    {
        $blogs = Blog::latest()->limit(5)->get();
        $settings = Settings::find(1);
        $feedbacks = Feedback::all();

        return view('frontend.pages.home.index', compact('blogs', 'settings', 'feedbacks'));
    }

    public function about(): View
    {
        $hostels = Hostels::limit(8)->get();
        $blog = Blog::limit(8)->get();
        $settings = Settings::find(1);

        return view('frontend.pages.about.index', compact('hostels', 'blog', 'settings'));
    }

    public function gallery(): View
    {
        $gallaries = Gallery::all();
        $settings = Settings::find(1);

        return view('frontend.pages.gallery.index', compact('gallaries', 'settings'));
    }

    public function contact(): View
    {
        $settings = Settings::find(1);

        return view('frontend.pages.contact.index', compact('settings'));
    }

    public function blog(): View
    {
        $settings = Settings::find(1);
        $blogs = Blog::all();

        return view('frontend.pages.blog.index', compact('settings', 'blogs'));
    }

    public function blogDetail(int $id, string $title): View
    {
        $blog = Blog::findOrFail($id);
        $settings = Settings::find(1);

        return view('frontend.pages.blog.show', compact('blog', 'settings'));
    }

    public function hostels(): View
    {
        $hostels = Hostels::paginate(12);
        $settings = Settings::find(1);

        return view('frontend.pages.hostels.index', compact('hostels', 'settings'));
    }

    public function hostelsDetail(int $id): View
    {
        $hostel = Hostels::findOrFail($id);
        $settings = Settings::find(1);
        $rooms = RoomSystem::where('hostels_id', $hostel->id)->get();
        $gallaries = Gallery::where('hostel_id', $id)->get();

        return view('frontend.pages.hostels.show', compact('hostel', 'settings', 'gallaries', 'rooms'));
    }

    public function categoryHostel(string $category): View
    {
        $hostels = Hostels::where('location', $category)->get();
        $settings = Settings::find(1);

        return view('frontend.pages.hostels.category', compact('hostels', 'settings'));
    }

    // ==================== Search Actions ====================

    public function search(Request $request): View|RedirectResponse
    {
        if (!$request->filled('search') && !$request->filled('gender') && !$request->filled('location')) {
            return redirect()->back();
        }

        $keywords = $request->input('search');
        $gender = $request->input('gender');
        $location = $request->input('location');

        $query = Hostels::query();

        if (!empty($keywords)) {
            $query->where(function ($searchQuery) use ($keywords) {
                $searchQuery->where('name', 'like', "%$keywords%")
                    ->orWhere('location', 'like', "%$keywords%")
                    ->orWhere('gender', 'like', "%$keywords%");
            });
        }

        if (!empty($gender)) {
            $query->where('gender', $gender);
        }

        if (!empty($location)) {
            $query->where('location', 'like', "%$location%");
        }

        $results = $query->paginate(12)->withQueryString();
        $settings = Settings::find(1);

        return view('frontend.pages.search.results', compact('results', 'settings'));
    }
}
