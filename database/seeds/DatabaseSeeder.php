<?php

use App\Models\Laradash\Post;
use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'tmgbedu@gmail.com',
            'password' => bcrypt('May30,2019'),
            'name' => 'Bedram TamanG'
        ]);
        factory(Post::class, 15)->create();
    }
}
