<?php

use Aammui\Laradash\Facade\Laradash;

Route::get('/', 'Front\PageController@index');
Route::get('posts/{id}/{title}', 'Front\PageController@post');
Route::get('about-me-bedram-tamang', function () {
    return view('front.pages.bedram-tamang');
});


Laradash::route();
