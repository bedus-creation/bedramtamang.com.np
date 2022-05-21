<?php

// use Aammui\Laradash\Facade\Laradash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Front\PageController@index');
Route::get('posts/{id}/{title}', 'Front\PageController@post');
Route::get('blogs', 'Front\PageController@blogs');
Route::get('open-source', 'Front\PageController@openSource');
Route::get('sitemap.xml', 'Laradash\SitemapController');
Route::get('about-me-bedram-tamang', 'Front\PageController@about');

Route::get('/home', 'HomeController@index')->name('home');

// Laradash::route();

Auth::routes();
