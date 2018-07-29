@extends('layouts.rss')

@section('content')
    @foreach($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <link>{{ route('post.show', $post->id) }}</link>
            <pubDate>{{ $post->created_at->format('r') }}</pubDate>
            <description><![CDATA[{{ $post->body }}]]></description>
        </item>
    @endforeach
@endsection
