@extends('layouts.app')

@section('title', 'Post a Comment!')

@section('content')
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(['route' => ['comment.store', $post_id]]) !!}
            {{ Form::token() }}
            {{ Form::hidden('_method', 'POST') }}

            <div class="form-group">
                {!! Form::textarea('body', null, ['placeholder' => 'Want to comment on this?', 'class' => 'input-block', 'required']) !!}
            </div>

            {{ Form::submit('Submit', ['class' => 'paper-btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
