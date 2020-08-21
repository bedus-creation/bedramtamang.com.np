<?php

use Ausi\SlugGenerator\SlugGenerator;
use Illuminate\Support\Str;
use Illuminate\Mail\Markdown;

function markdownToHtml($data)
{
    return Markdown::parse($data);
}

function getImage()
{
    return "https://picsum.photos/200/300";
}


function generateUrlFromTitle($title)
{
    // Generate a 12 digits MD5 slug from Id
    $salt = substr(md5(time()), 0, 12);

    // Slug from title
    $generator  = new SlugGenerator();
    $title = $generator->generate($title);

    // Return Url
    return $title . '-' . $salt;
}

function isUserLink()
{
    $isUserLink = Str::contains(
        request()->url(),
        [route('users.index'), route('roles.index')]
    );
    return $isUserLink ? 'true' : 'false';
}

function isCmsLink()
{
    $isCmsLink = Str::contains(
        request()->url(),
        [route('articles.index'), route('categories.index'), route('tags.index')]
    );
    return $isCmsLink ? 'true' : 'false';
}
