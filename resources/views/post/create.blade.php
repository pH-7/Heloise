@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Add Post</h1></div>

                    <div class="collapsible-body">
                        {!! Form::open(['action' => 'PostController@store']) !!}
                        {{ Form::token() }}
                        {{ Form::hidden('_method', 'POST') }}

                            <div class="form-group">
                                {{ Form::text('title', null, ['placeholder' => 'What are you writing about..?', 'class' => 'input-block', 'required']) }}
                            </div>

                        <div class="form-group">
                            {!! Form::textarea('body', null, ['placeholder' => 'Be inspire! Write your thoughts...', 'class' => 'input-block', 'required']) !!}
                        </div>

                        {{ Form::submit('Add Post', ['class' => 'paper-btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
