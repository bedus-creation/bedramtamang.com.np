<?php

// use Aammui\Laradash\Facade\Laradash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('sitemap.xml', 'Laradash\SitemapController');


Route::get('/home', 'HomeController@index')->name('home');

// Laradash::route();

Auth::routes();
