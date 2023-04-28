<?php

namespace Database\Seeders;

use App\Domain\User\Enums\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $email = $this->command->ask('Enter the admin email address ?', 'tmgbedu@gmail.com');
        $password = $this->command->ask('Enter the password ?', 'password');

        /** @var User $user */
        $user = User::factory()->create([
            'email'    => $email,
            'password' => bcrypt($password),
            'name'     => 'Bedram Tamang'
        ]);

        $user->addRole(Role::SYSTEM_ADMIN->value);
    }
}
