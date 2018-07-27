@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Update Post</h1></div>

                    <div class="collapsible-body">
                        {!! Form::open(['action' => 'PostController@update']) !!}
                        {{ Form::token() }}

                        <div class="form-group">
                            {{  Form::text('title', null, ['class' => 'input-block']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::textarea('body', null, ['placeholder' => 'Be inspire! Write your thoughts...', 'class' => 'input-block', 'rows' => 6, 'cols' => 40]) !!}
                        </div>

                        {{ Form::submit('Update Post', ['class' => 'paper-btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
