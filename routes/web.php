<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('sitemap.xml', 'Laradash\SitemapController');

Auth::routes();
