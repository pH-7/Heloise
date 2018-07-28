@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="collapsible">
            <article>
                <h3>{{ $post->title }}</h3>
                <div class="collapsible-body">{{ $post->body }}</div>
            </article>
        </div>
        @auth
            <hr />
            <div class="text-center">
                <a href="{{ route('edit', ['id' => $post->id]) }}">
                    <button class="paper-btn">Edit Post</button>
                </a>

                {!! Form::open(['action' => ['PostController@destroy',  $post->id]])!!}
                {{ Form::token() }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete Post', ['class' => 'paper-btn btn-danger']) }}
                {!! Form::close() !!}
            </div>
        @endauth

        @include('comment._thread')
    </div>
@endsection
