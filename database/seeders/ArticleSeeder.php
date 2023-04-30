<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\PostFactory;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostFactory::new()->times(5)->create();
    }
}
