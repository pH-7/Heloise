<?php

namespace Tests\Feature;

use Teapot\StatusCode;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewBlogPostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexBlog(): void
    {
        $response = $this->get('/');
        $response->assertStatus(StatusCode::OK);
    }
}
