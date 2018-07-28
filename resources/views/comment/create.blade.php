@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(['action' => ['CommentController@store', $post->id]]) !!}
            {{ Form::token() }}
            {{ Form::hidden('_method', 'POST') }}

            <div class="form-group">
                {!! Form::textarea('body', null, ['placeholder' => 'Want to comment on this?', 'class' => 'input-block', 'rows' => 4, 'cols' => 40, 'required']) !!}
            </div>

            {{ Form::submit('Submit', ['class' => 'paper-btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

