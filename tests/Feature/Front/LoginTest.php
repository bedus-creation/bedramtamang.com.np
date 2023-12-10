<?php

namespace Tests\Feature\Front;

use Database\Factories\UserFactory;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testLoginRedirectsToAdmin()
    {
        UserFactory::new()->create([
            'email' => 'test@gmail.com'
        ]);

        $data = ['email' => 'test@gmail.com', 'password' => 'password'];

        $this->post(route('login'), $data)
            ->assertRedirect(route('admin.dashboard.index'));
    }
}
