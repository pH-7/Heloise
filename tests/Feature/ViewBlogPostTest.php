<?php

declare(strict_types=1);

namespace Tests\Feature;

use Teapot\StatusCode;
use Tests\TestCase;

class ViewBlogPostTest extends TestCase
{
    public function testIndexBlog(): void
    {
        $response = $this->get('/');
        $response->assertStatus(StatusCode::OK);
    }
}
