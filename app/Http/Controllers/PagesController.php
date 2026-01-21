<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome To MyLFS!';
        return view('pages.index')->with('title', $title);
    }

    public function about()
    {
        $title = 'About MyAPI';
        return view('pages.about', compact('title'));
    }

    public function login()
    {
        return view('pages.login', ['title' => 'Login']);
    }

    public function register()
    {
        return view('pages.register', ['title' => 'Register']);
    }

    /*public function dashboard()
    {
        $posts = Post::where('user_id', Auth::id())
            ->latest()
            ->take(5)
            ->get();

        return view('pages.dashboard', compact('posts'));
    }
	*/
    public function posts()
    {
        return view('pages.dashboard', ['title' => 'posts']);
    }

    public function contact()
    {
        return view('pages.contact', ['title' => 'Contact Us']);
    }

    public function services()
    {
        $data = [
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'AI Development']
        ];

        return view('pages.services')->with($data);
    }
}
