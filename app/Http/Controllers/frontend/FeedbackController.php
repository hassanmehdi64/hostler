<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    // ==================== Feedback Pages ====================

    public function create(): View
    {
        return view('admin.feedback.create');
    }

    // ==================== Feedback Actions ====================

    public function store(Request $request): RedirectResponse
    {
        if ($request->hasFile('profile')) {
            $profilePath = $this->storeImage($request->file('profile'));

            Feedback::create([
                'name' => $request->input('name'),
                'profile' => $profilePath,
                'feedback' => $request->input('feedback'),
            ]);

            return back()->with('message', 'Feedback Submitted Successfully');
        }

        return back()->with('message', 'Profile image is required.');
    }

    // ==================== Internal Helpers ====================

    private function storeImage($file): string
    {
        $fileName = $file->getClientOriginalName();
        $relativePath = 'feedbackimages/' . $fileName;
        $file->move(public_path('feedbackimages'), $fileName);

        return $relativePath;
    }
}
