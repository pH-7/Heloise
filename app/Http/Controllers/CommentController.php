<?php

namespace App\Http\Controllers;

use App\Models\Post as PostModel;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('add');
    }

    public function add(PostModel $post, Request $request): void
    {
        $post->addComment(
            [
                'body' => $request->get('body'),
                'user_id' => auth()->id()
            ]
        );
    }
}
