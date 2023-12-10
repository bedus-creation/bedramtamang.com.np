<?php

namespace App\Domain\CMS\Models;

use Aammui\LaravelMedia\Enum\Responsive;
use Aammui\LaravelMedia\Models\Media;
use Aammui\LaravelMedia\Traits\HasMedia;
use Aammui\LaravelTaggable\Traits\HasCategory;
use Aammui\LaravelTaggable\Traits\HasTag;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasCategory, HasTag;
    use HasMedia;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'type',
        'user_id',
        'external_link'
    ];

    public function link(): string
    {
        return $this->external_link ?? url('posts/' . $this->id . '/' . Str::slug($this->title));
    }

    public function cover($size = Responsive::SM): string
    {
        /** @var Media $media */
        $media = $this->fromCollection('cover')->getMedia()->first();

        $link = json_decode($media?->in_json, true);

        if (isset($link['url']['lg'])) {
            $path = $link['url']['lg'];
            return Storage::disk($media->disk)->url($path);
        }

        return "/assets/img/logo.png";
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
