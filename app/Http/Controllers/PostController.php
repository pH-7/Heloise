<?php

namespace App\Http\Controllers;

use App\Models\Post as PostModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function index(Request $request, PostModel $post): View
    {
        $posts = PostModel::orderBy('created_at', 'desc')
            ->latest()
            ->paginate(self::ITEMS_PER_PAGE);
        
        return view('post.index', compact('posts'));
    }


    public function show($id): View
    {
        $post = PostModel::find($id);

        return view('post.show', compact('post'));
    }

    public function edit($id): View
    {
        $post = PostModel::find($id);

        return view('post.edit', ['post' => $post]);
    }

    public function store(Request $request): RedirectResponse
    {
        $post = PostModel::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);

        return redirect('/' . $post->id)
            ->with('success', 'Post added successfully!');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $post = PostModel::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect()
            ->route('homepage')
            ->with('success', 'Post has been updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $post = PostModel::find($id);
        $post->delete();

        return redirect()
            ->route('homepage')
            ->with('success', 'Post has been deleted successfully!');
    }
}
