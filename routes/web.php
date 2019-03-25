<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('about-me-bedram-tamang', function () {
    return view('front.pages.bedram-tamang');
});
