<?php

namespace App\Http\Controllers\Laradash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Laradash\Post;

class SitemapController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = Post::all();
        $content = view('laradash.utils.sitemap', compact('data'));
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
