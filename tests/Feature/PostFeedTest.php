<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Post as PostModel;
use Teapot\StatusCode;
use Tests\TestCase;

class PostFeedTest extends TestCase
{
    public function testCanReachFeedPage(): void
    {
        $response = $this->get('/feed');
        $response->assertStatus(StatusCode::OK);
    }

    public function testCanSeeFeed(): void
    {
        $post = factory(PostModel::class)->create();

        $response = $this->get('/feed');
        $response->assertStatus(StatusCode::OK);
        $response->assertSee($post->title);
    }
}
