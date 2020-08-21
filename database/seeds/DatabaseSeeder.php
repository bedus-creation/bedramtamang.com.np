<?php

use App\Domain\User\Enums\Role;
use App\Domain\CMS\Models\Post;
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
        $user = factory(User::class)->create([
            'email' => 'tmgbedu@gmail.com',
            'password' => bcrypt('May30,2019'),
            'name' => 'Bedram TamanG'
        ]);
        $user->addRole(Role::SYSTEM_ADMIN);

        factory(Post::class, 4)->create();
    }
}
