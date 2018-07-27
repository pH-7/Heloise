<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @if (auth()->check())
            @foreach($post->comment as $comment)
                <article class="article">
                    {{-- <div class="panel-heading">{{ $comment->created_at }}</div> --}}
                    <div class="article-meta">
                        {{ $comment->creator->name }} &bull; {{ $comment->created_at->diffForHumans() }}
                    </div>
                    <div class="text-center">{{ $comment->body }}</div>
                </article>
            @endforeach
        @else
            <p class="text-center">
                You need to <a href="{{ route('login') }}">sign in</a> in order to comment this.
            </p>
        @endif
    </div>
</div>
