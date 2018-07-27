<?php

namespace Tests\Feature;

use App\Models\Post as PostModel;
use App\Models\User as UserModel;
use Illuminate\Auth\AuthenticationException;
use Teapot\StatusCode;
use Tests\TestCase;

class PostTest extends TestCase
{
    private const USER_ID = 1;

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

        $response = $this->get('/' . $post->id);
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
        $response = $this->get('/' . $post->id);
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

    public function testCanUserNotAccessAddPostPage(): void
    {
        $this->get('/blog/create')
            ->assertRedirect('/login');
    }

    public function testCanPostAddComment(): void
    {
        /** @var PostModel $post */
        $post = factory(PostModel::class)->create();

        $post->addComment([
            'body' => 'Blablabla',
            'user_id' => self::USER_ID
        ]);

        $this->assertCount(1, $post->comment);
    }

    public function testCanVisitorSeeCommentWhenVisitPost(): void
    {
        $post = factory(PostModel::class)->create();

        $comment = factory(CommentModel::class)
            ->create(['post_id' => $post->id]);

        $response = $this->get('/' . $post->id);

        $response->assertSee($comment->body);
    }
}



