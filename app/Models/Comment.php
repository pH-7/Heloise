<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Comment extends MongoModel
{
    protected $connection = 'mongodb';

    /** @var array */
    protected $guarded = [];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
