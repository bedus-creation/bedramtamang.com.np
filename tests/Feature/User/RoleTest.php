<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\Authenticate;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;
    use Authenticate;

    public function setUp(): void
    {
        parent::setUp();

        $this->authenticate();
    }

    #[Test]
    #[DataProvider('role200StatusRoutes')]
    public function roleRoutes200StatusTest($route, $status)
    {
        $this->get($route)
            ->assertStatus($status);
    }


    public static function role200StatusRoutes(): \Generator
    {
        yield ['admin/roles', 200];
    }
}
