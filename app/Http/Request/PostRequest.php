<?php

declare(strict_types=1);

namespace App\Http\Request;

class PostRequest extends Request
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:50',
            'body' => 'required'
        ];
    }
}
