<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post as PostModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(): View
    {
        return view('comment.create');
    }

    public function store(PostModel $post, Request $request): void
    {
        $post->storeComment(
            [
                'body' => $request->get('body'),
                'user_id' => auth()->id()
            ]
        );
    }
}
