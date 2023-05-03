<?php

namespace App\Domain\CMS\Models;

use Aammui\LaravelMedia\Enum\Responsive;
use Aammui\LaravelMedia\Traits\HasMedia;
use Aammui\LaravelTaggable\Traits\HasCategory;
use Aammui\LaravelTaggable\Traits\HasTag;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasCategory, HasTag, HasMedia;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'type',
        'user_id'
    ];

    public function link(): string
    {
        return url('posts/' . $this->id . '/' . Str::slug($this->title));
    }

    public function getCoverAttribute()
    {
        return optional(optional($this->fromCollection('cover')->getMedia())->first())->link(Responsive::LG)
            ?? "/assets/img/logo.png";
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
