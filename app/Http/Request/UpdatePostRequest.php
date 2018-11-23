<?php

declare(strict_types=1);

namespace App\Http\Request;

class UpdatePostRequest extends PostRequest
{
    public function rules(): array
    {
        return parent::rules();
    }
}
