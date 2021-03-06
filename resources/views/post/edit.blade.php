@extends('layouts.app')

@section('title', 'Edit Post | ' . $post->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Update Post</h2>

                <div class="collapsible-body">
                    {!! Form::open(['route' => ['post.update', $post->id]]) !!}
                    {{ Form::token() }}
                    {{ Form::hidden('_method', 'PUT') }}

                    <div class="form-group">
                        {{ Form::text('title', $post->title, ['class' => 'input-block', 'required']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::textarea('body', $post->body, ['class' => 'input-block', 'required']) !!}
                    </div>

                    {{ Form::submit('Update Post', ['class' => 'paper-btn btn-primary']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
