<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /** @var array */
    protected $guarded = [];

    // TODO: Add comments feature (didn't have time for this :))

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
