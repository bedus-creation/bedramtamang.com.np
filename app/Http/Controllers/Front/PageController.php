<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Domain\CMS\Models\Post;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(12);
        return view('front.pages.welcome', compact('posts'));
    }

    public function post($id, $title)
    {
        $post = Post::findOrFail($id);
        return view('front.pages.post', compact('post'));
    }

    public function blogs()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(8);
        return view('front.pages.blogs.index', compact('posts'));
    }

    public function about()
    {
        return view('front.pages.about.index');
    }

    public function openSource()
    {
        return view('front.pages.open-source.index');
    }
}
