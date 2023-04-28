<?php

namespace Tests;

use App\Domain\User\Enums\Role;
use App\User;
use Database\Factories\UserFactory;

trait Authenticate
{
    public function authenticate(?Role $role = Role::ADMIN, ?User $user = null)
    {
        $user = $user ?? UserFactory::new()->create();

        if ($role) {
            $user->addRole($role->value);
        }

        $this->be($user);

        return $user;
    }
}
