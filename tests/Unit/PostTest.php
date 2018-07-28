<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Post as PostModel;
use App\Models\User as UserModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    private const USER_ID = 1;

    public function testPostShouldHaveCreator(): void
    {
        $post = factory(PostModel::class)->create();
        $this->assertInstanceOf(UserModel::class, $post->creator);
    }

    public function testCanPostAddComment(): void
    {
        $post = factory(PostModel::class)->create();
        $post->storeComment([
            'body' => 'Blablabla',
            'user_id' => self::USER_ID
        ]);

        $this->assertCount(1, $post->comment);
    }
}
