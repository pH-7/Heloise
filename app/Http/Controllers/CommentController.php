<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post as PostModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($postId): View
    {
        return view('comment.create', ['post_id' => $postId]);
    }

    public function store(Request $request, PostModel $post, $postId): RedirectResponse
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $post->storeComment(
            [
                'post_id' => $postId,
                'user_id' => auth()->id(),
                'body' => $request->get('body')
            ]
        );

        return redirect()
            ->route('post.show', $postId)
            ->with('success', 'Comment added successfully!');
    }
}
