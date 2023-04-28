<?php

namespace App\Application\Admin\Controllers;

use Aammui\LaravelMedia\Facades\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'link' => $media->link()
        ]);
    }
}
