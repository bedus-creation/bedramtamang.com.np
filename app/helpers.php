<?php

use Ausi\SlugGenerator\SlugGenerator;

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
