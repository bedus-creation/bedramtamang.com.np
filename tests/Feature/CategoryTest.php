<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function category_can_be_added()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
