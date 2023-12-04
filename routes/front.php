<?php

use App\Application\Front\Controllers\PageController;
use App\Application\Front\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);
Route::get('posts/{id}/{title}', [PageController::class, 'post']);
Route::get('open-source', [PageController::class, 'openSource']);
Route::get('blogs', [PageController::class, 'blogs']);
Route::get('about-me-bedram-tamang', [PageController::class, 'about']);
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/article-sitemap.xml', [SitemapController::class, 'article']);
