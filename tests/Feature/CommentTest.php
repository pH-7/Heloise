<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Comment as CommentModel;
use App\Models\Post as PostModel;
use App\Models\User as UserModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase; // Import RefreshDatabase trait

    public function testCommentShouldHaveCreator(): void
    {
        $comment = factory(CommentModel::class)->create();
        $this->assertInstanceOf(UserModel::class, $comment->creator);
    }

    public function testCanUserAddComment(): void
    {
        $user = factory(UserModel::class)->create();

        $this->be($user);
        $post = factory(PostModel::class)->create();
        $comment = factory(CommentModel::class)->make();

        $this->post('/' . $post->id . '/comment', $comment->toArray());
        $this->get('/' . $post->id)->assertSee($comment->body);
    }

    public function testCanUserNotAddComment(): void
    {
        $post = factory(PostModel::class)->create();
        $comment = factory(CommentModel::class)->make();
        $this->post('/' . $post->id . '/comment', $comment->toArray());

        $this->get('/' . $post->id)->assertDontSee($comment->body);
    }
}


