<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // ==================== Contact Actions ====================

    public function store(Request $request): RedirectResponse
    {
        ContactUs::create($request->all());

        return back()->with('message', 'You Form Submitted Successfully We will Reach You Soon!');
    }
}
