<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Laradash\Post;

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
}
