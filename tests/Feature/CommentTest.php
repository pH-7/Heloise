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

    private const URI_POST_PATH_NAME = '/post/';
    private const URI_COMMENT_PATH_NAME = '/comment';

    public function testCanUserAddComment(): void
    {
        $user = factory(UserModel::class)->create();

        $this->be($user);
        $post = factory(PostModel::class)->create();
        $comment = factory(CommentModel::class)->make();

        $this->post(self::URI_POST_PATH_NAME . $post->id . self::URI_COMMENT_PATH_NAME, $comment->toArray());
        $this->get(self::URI_POST_PATH_NAME . $post->id)->assertSee($comment->body);
    }

    public function testCanUserNotAddComment(): void
    {
        $post = factory(PostModel::class)->create();
        $comment = factory(CommentModel::class)->make();
        $this->post(self::URI_POST_PATH_NAME . $post->id . self::URI_COMMENT_PATH_NAME, $comment->toArray());

        $this->get(self::URI_POST_PATH_NAME . $post->id)->assertDontSee($comment->body);
    }
}
