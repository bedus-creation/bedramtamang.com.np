<?php

namespace Tests\Feature\Admin;

use Database\Factories\PostFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ArticleCoverTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function cover_upload_stores_resized_variants(): void
    {
        Storage::fake('public');
        $post = PostFactory::new()->create();

        $post->toCollection('cover')
            ->toDisk('public')
            ->addMedia(UploadedFile::fake()->image('cover.jpg', 1200, 800));

        $urls = json_decode($post->fromCollection('cover')->getMedia()->first()->in_json, true)['url'];

        foreach (['sm', 'md', 'lg'] as $size) {
            Storage::disk('public')->assertExists($urls[$size]);
        }

        [$width, $height] = getimagesizefromstring(Storage::disk('public')->get($urls['lg']));
        $this->assertSame([600, 400], [$width, $height]);
        $this->assertSame(Storage::disk('public')->url($urls['lg']), $post->cover());
    }

    #[Test]
    public function sitemap_renders_post_cover_image(): void
    {
        Storage::fake('public');
        $post = PostFactory::new()->create();
        $post->toCollection('cover')
            ->toDisk('public')
            ->addMedia(UploadedFile::fake()->image('cover.png', 800, 800));

        $this->get('sitemap.xml')
            ->assertOk()
            ->assertSee($post->cover(), false);
    }
}
