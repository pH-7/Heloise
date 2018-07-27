@extends('layouts.app')

@section('content')
    <div class="collapsible">
        @foreach($posts as $post)
            <article>
                <h3>{{ $post->title }}</h3>
                <div class="collapsible-body">{{ $post->body }}</div>
            </article>
        @endforeach
    </div>
    @if (auth()->check())
        <hr />
        <p class="text-center">
            <a class="paper-btn" href="{{ route('edit', ['id' => $post->id]) }}">Edit Post</a> &bull; <a class="paper-btn" href="{{ route('post.delete', ['id' => $post->id]) }}">Delete Post</a>
        </p>
    @endif

    @include('comment.add')

    @include('comment.thread')
@endsection
