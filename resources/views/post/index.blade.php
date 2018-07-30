@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="margin">
                    <div class="collapsible">
                        @forelse($posts as $post)
                            <article>
                                <h3 class="text-center"><a class="article-title" href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h3>
                                <div class="collapsible-body text-center">{{ mb_strimwidth($post->body, 0, 300, '...') }}</div>
                            </article>
                            <hr />
                            @empty
                                @auth
                                    <h4 class="text-center">
                                        ⭐<a href="{{ route('post.create') }}">Add A Post</a>⭐
                                    </h4>
                                @endauth
                                @guest
                                    <h4 class="text-center">
                                        Oops! Nothing for the moment. Come back soon!
                                    </h4>
                                @endguest
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
