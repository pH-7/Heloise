@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="col col-md-12">
            <article>
                <h3 class="article-title text-center">{{ $post->title }}</h3>
                <div class="collapsible-body text-center">{{ $post->body }}</div>
            </article>
            @auth
                <hr />
                <div class="text-center">
                    {!! Form::open(['route' => ['post.edit',  $post->id], 'method' => 'get', 'class' => 'inline'])!!}
                    {{ Form::submit('Edit Post', ['class' => 'paper-btn']) }}
                    {!! Form::close() !!}

                    {!! Form::open(['route' => ['post.destroy',  $post->id], 'class' => 'inline'])!!}
                    {{ Form::token() }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete Post', ['class' => 'paper-btn btn-danger']) }}
                    {!! Form::close() !!}
                </div>
            @endauth
        </div>
    </div>
    @include('comment._thread')
@endsection
