<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function category_can_be_added()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
