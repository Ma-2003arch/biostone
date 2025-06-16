<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\User; // Add this at the top

class DashboardController extends Controller
{
    public function dashboard()
    {
        $contents = Content::latest()->paginate(10);
        $users = User::all();
        return view('admin.dashboard', compact('contents', 'users'));
    }
}
