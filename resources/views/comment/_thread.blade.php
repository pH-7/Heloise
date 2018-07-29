<div class="row">
    <div class="col col-md-12">
        <h4 class="text-center">
            <a href="{{ route('comment.create', ['postId' => $post->id]) }}" rel="nofollow">Add a Comment</a>
        </h4>

        <div class="row child-borders">
            <div class="col border border-secondary">
                @forelse($post->comment as $comment)
                    <article class="article">
                        {{-- <div class="panel-heading">{{ $comment->created_at }}</div> --}}
                        <div class="article-meta text-center">
                            <em>{{ $comment->creator->name }} • {{ $comment->created_at->diffForHumans() }}</em>
                        </div>
                        <div class="text-center">
                            {{ $comment->body }}
                        </div>
                    </article>
                    <hr />
                @empty
                    <p class="text-center">
                        Be the first to add a comment!
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
