<?php

namespace Database\Factories;

use App\Domain\CMS\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Post::class>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;

        return [
            'title'   => $title,
            'slug'    => Str::slug($title),
            'body'    => $this->faker->paragraph(4),
            'type'    => $this->faker->randomElement(['Article']),
            'status'  => $this->faker->randomElement(['Published', 'Draft']),
            'user_id' => UserFactory::new()->create()
        ];
    }
}
