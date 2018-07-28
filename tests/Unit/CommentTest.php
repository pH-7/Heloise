<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Comment as CommentModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function testCommentShouldHaveCreator(): void
    {
        $comment = factory(CommentModel::class)->create();
        $this->assertInstanceOf(UserModel::class, $comment->creator);
    }

    public function testCreatedAt(): void
    {
        $comment = factory(CommentModel::class)->create();
        $this->assertEquals($comment->created_at->toDateTimeString(), now()->toDateTimeString());
    }
}
