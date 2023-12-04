<?php

namespace App\Application\Front\Controllers;

use App\Domain\CMS\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): view
    {
        $posts = Post::query()
            ->orderByDesc('id')
            ->paginate(12);

        return view('front.pages.welcome', compact('posts'));
    }

    public function post($id, $title)
    {
        $post = Post::query()->with('user')->findOrFail($id);

        return view('front.pages.post', compact('post'));
    }

    public function blogs(): View
    {
        $posts = Post::query()->orderBy('id', 'desc')->paginate(8);

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
