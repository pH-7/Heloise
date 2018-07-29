<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Post as PostModel;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PostFeedTest extends TestCase
{
    public function testCanReachFeedPage(): void
    {
        $response = $this->get(route('post.feed.index'));
        $response->assertSee('The latest blog posts');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testCanSeeFeed(): void
    {
        $post = factory(PostModel::class)->create();

        $response = $this->get(route('post.feed.index'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee($post->title);
    }
}
