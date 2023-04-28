<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
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

    /**
     * @test
     *
     * @dataProvider role200StatusRoutes()
     */
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
