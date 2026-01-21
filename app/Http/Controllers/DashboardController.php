<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Auth::user()
            ->posts()
            ->latest()
            ->take(5)
            ->get();

        return view('pages.dashboard', compact('posts'));
    }
}
