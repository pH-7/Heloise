<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Post as PostModel;
use App\Models\User as UserModel;
use Illuminate\Auth\AuthenticationException;
use Teapot\StatusCode;
use Tests\TestCase;

class PostTest extends TestCase
{
    private const URI_POST_PATH_NAME = '/post/';

    public function testCanVisitorSeeHomepage(): void
    {
        $post = factory(PostModel::class)->create();

        $response = $this->get('/');
        $response->assertStatus(StatusCode::OK);
        $response->assertSee($post->title);
    }

    public function testCanUserSeePost(): void
    {
        $post = factory(PostModel::class)->create();

        $response = $this->get(self::URI_POST_PATH_NAME . $post->id);
        $response->assertStatus(StatusCode::OK);
        $response->assertSee($post->title);
    }

    public function testCanUserCreatePost(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(UserModel::class)->create();
        $this->be($user);

        /** @var PostModel $post */
        $post = factory(PostModel::class)->make();
        $this->post('/post', $post->toArray());
        $response = $this->get(self::URI_POST_PATH_NAME . $post->id);
        $response->assertSee($post->title);
    }

    public function testCanUserNotCreatePost(): void
    {
        $this->withoutExceptionHandling();

        $this->expectException(AuthenticationException::class);

        factory(UserModel::class)->create();

        /** @var PostModel $post */
        $post = factory(PostModel::class)->make();

        $this->post('/post', $post->toArray());

    }

    public function testCanUserEditPost(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(UserModel::class)->create();
        $this->be($user);

        /** @var PostModel $post */
        $post = factory(PostModel::class)->make();
        $this->post('/post', $post->toArray());
        $response = $this->get(self::URI_POST_PATH_NAME . $post->id);
        $response->assertSee($post->title);
    }

    public function testCanUserNotEditPost(): void
    {
        $this->withoutExceptionHandling();

        $this->expectException(AuthenticationException::class);

        factory(UserModel::class)->create();

        /** @var PostModel $post */
        $post = factory(PostModel::class)->make();

        $this->post(self::URI_POST_PATH_NAME, $post->toArray());

    }

    public function testCanUserNotAccessToCreatePostPage(): void
    {
        $this->get(self::URI_POST_PATH_NAME . 'create')
            ->assertRedirect('/login');
    }

    public function testCanVisitorSeeCommentWhenVisitPost(): void
    {
        $post = factory(PostModel::class)->create();

        $comment = factory(CommentModel::class)
            ->create(['post_id' => $post->id]);

        $response = $this->get(self::URI_POST_PATH_NAME . $post->id);

        $response->assertSee($comment->body);
    }
}



