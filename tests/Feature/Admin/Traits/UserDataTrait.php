<?php

namespace Tests\Feature\Admin\Traits;

trait UserDataTrait
{
    public function getFormData(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password'
        ];
    }
}
