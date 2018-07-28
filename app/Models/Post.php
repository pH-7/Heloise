<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /** @var array */
    protected $guarded = [];

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function storeComment(string $comment): void
    {
        $this->comment()->create($comment);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
