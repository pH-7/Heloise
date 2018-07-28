@section('content')
    <div class="row">
        <div class="col-md-8">
            {!! Form::open(['action' => ['CommentController@add', $post->id]]) !!}
            {{ Form::token() }}

            <div class="form-group">
                {!! Form::textarea('body', null, ['placeholder' => 'Want to comment on this?', 'class' => 'input-block', 'rows' => 4, 'cols' => 40]) !!}
            </div>

            {{ Form::submit('Submit', ['class' => 'paper-btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection