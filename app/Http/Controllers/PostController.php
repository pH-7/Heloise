<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Request\PostRequest;
use App\Models\Post as PostModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    private const ITEMS_PER_PAGE = 20;

    public function __construct()
    {
        $this->middleware(
            'auth',
            ['except' => ['index', 'show']]
        );
    }

    public function index(): View
    {
        $posts = PostModel::latest()
            ->paginate(self::ITEMS_PER_PAGE);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $post = PostModel::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);

        return redirect()
            ->route('post.show', $post->id)
            ->with('success', 'Post added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $post = PostModel::find($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $post = PostModel::find($id);

        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id): RedirectResponse
    {
        $post = PostModel::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect()
            ->route('post.edit', $id)
            ->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $post = PostModel::find($id);
        $post->delete();

        return redirect()
            ->route('homepage')
            ->with('success', 'Post deleted!');
    }
}
