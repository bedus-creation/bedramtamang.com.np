<?php

use Aammui\Laradash\Facade\Laradash;

Route::get('/', 'Front\PageController@index');
Route::get('posts/{id}/{title}', 'Front\PageController@post');
Route::get('blogs', 'Front\PageController@blogs');
Route::get('open-source', 'Front\PageController@openSource');
Route::get('sitemap.xml', 'Laradash\SitemapController');
Route::get('about-me-bedram-tamang', 'Front\PageController@about');


Laradash::route();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
