<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Comment as CommentModel;
use App\Models\Post as PostModel;
use App\Models\User as UserModel;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testCanVisitorSeeHomepage(): void
    {
        $post = factory(PostModel::class)->create();

        $response = $this->get(route('homepage'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee($post->title);
    }

    public function testCanUserSeePost(): void
    {
        $post = factory(PostModel::class)->create();

        $response = $this->get(route('post.show', $post->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee($post->title);
    }

    public function testCanUserCreatePost(): void
    {
        $user = factory(UserModel::class)->create();
        $this->be($user);

        /** @var PostModel $post */
        $post = factory(PostModel::class)->create();
        $this->post(route('post.store'), $post->toArray());
        $response = $this->get(route('post.show', $post->id));
        $response->assertSee($post->title);
        $response->assertSee($post->body);
    }

    public function testCanUserNotCreatePost(): void
    {
        $this->withoutExceptionHandling();
        $this->expectException(AuthenticationException::class);

        factory(UserModel::class)->create();

        /** @var PostModel $post */
        $post = factory(PostModel::class)->make();

        $this->post(route('post.store'), $post->toArray());
    }

    public function testCanUserEditPost(): void
    {
        $user = factory(UserModel::class)->create();
        $this->be($user);

        /** @var PostModel $post */
        $post = factory(PostModel::class)->create();
        $this->put(route('post.update', $post->id), $post->toArray());
        $response = $this->get(route('post.edit', $post->id));
        $response->assertSee('Edit Post | ' . $post->title);
    }

    public function testCanUserNotEditPost(): void
    {
        $this->withoutExceptionHandling();
        $this->expectException(AuthenticationException::class);

        factory(UserModel::class)->create();

        /** @var PostModel $post */
        $post = factory(PostModel::class)->create();

        $this->put(route('post.update', $post->id), $post->toArray());
    }

    public function testCanUserDeletePost(): void
    {
        $user = factory(UserModel::class)->create();
        $this->be($user);

        /** @var PostModel $post */
        $post = factory(PostModel::class)->create();
        $this->delete(route('post.destroy', $post->id), $post->toArray());
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
        $this->assertSame(0, $post::count());
    }

    public function testCanUserNotDeletePost(): void
    {
        $this->withoutExceptionHandling();
        $this->expectException(AuthenticationException::class);

        factory(UserModel::class)->create();

        /** @var PostModel $post */
        $post = factory(PostModel::class)->create();

        $this->delete(route('post.destroy', $post->id), $post->toArray());
    }

    public function testCanUserNotAccessToCreatePostPage(): void
    {
        $this->get(route('post.create'))
            ->assertRedirect('/login');
    }

    public function testCanVisitorSeeCommentWhenVisitPost(): void
    {
        $post = factory(PostModel::class)->create();

        $comment = factory(CommentModel::class)
            ->create(['post_id' => $post->id]);

        $response = $this->get(route('post.show', $post->id));
        $response->assertSee($comment->body);
    }
}
