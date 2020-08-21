<?php

namespace App\Domain\CMS\Models;

use Aammui\LaravelTaggable\Traits\HasTag;
use Aammui\LaravelTaggable\Traits\HasCategory;
use Aammui\LaravelMedia\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasCategory, HasTag, HasMedia;

    protected $fillable = ['title', 'slug', 'body', 'user_id'];

    public function frontUrl()
    {
        return url('posts/' . $this->id . '/' . str_slug($this->title));
    }
    public function getCoverAttribute()
    {
        return optional(optional($this->fromCollection('cover')->getMedia())->first())->link()
            ?? "/assets/img/logo.png";
    }
}
