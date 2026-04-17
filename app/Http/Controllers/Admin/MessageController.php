<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\View\View;

class MessageController extends Controller
{
    // ==================== Message Pages ====================

    public function index(): View
    {
        $messages = ContactUs::all();

        return view('admin.messages.index', compact('messages'));
    }
}
