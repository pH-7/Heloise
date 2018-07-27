<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    // TODO: Add comments feature (didn't have time for this :))

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
