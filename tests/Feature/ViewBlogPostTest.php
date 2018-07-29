<?php

declare(strict_types=1);

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ViewBlogPostTest extends TestCase
{
    public function testIndexBlog(): void
    {
        $response = $this->get('/');
        $response->assertStatus(Response::HTTP_OK);
    }
}
