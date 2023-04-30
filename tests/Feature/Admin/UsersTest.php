<?php

namespace Tests\Feature\Admin;

use App\Domain\User\Enums\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\Authenticate;
use Tests\Feature\Admin\Traits\UserDataTrait;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    use Authenticate;
    use WithFaker;
    use UserDataTrait;

    public function setUp(): void
    {
        parent::setUp();

        $this->authenticate();
    }

    /** @test */
    public function users_can_index()
    {
        $this->get(route('users.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function users_form_is_access_to_all()
    {
        $this->get(route('users.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function admin_can_create_users()
    {
        $data = $this->getFormData();

        $this->post(route('users.store'), $data)
            ->assertSessionHasNoErrors();

        // assert Data is persisted into te database
        $this->assertDatabaseHas('users', Arr::except($data, ['password']));

        // Login out and Assert User can log in with above credential
        auth()->logout();
        $this->post('login', [
            'email'    => $data['email'],
            'password' => $data['password']
        ])->assertSessionHasNoErrors();
        $this->assertAuthenticated();

        // Assert User has Admin Role
        $user = User::where('email', $data['email'])->first();
        $this->assertTrue($user->hasGotRole(Role::ADMIN->value));
    }
}
