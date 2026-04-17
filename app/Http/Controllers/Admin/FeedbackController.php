<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    // ==================== Feedback Pages ====================

    public function index(): View
    {
        $feedbacks = Feedback::all();

        return view('admin.feedback.index', compact('feedbacks'));
    }

    // ==================== Feedback Actions ====================

    public function destroy(int $id): RedirectResponse
    {
        Feedback::destroy($id);

        return back()->with('message', 'Removed Successfully');
    }
}
