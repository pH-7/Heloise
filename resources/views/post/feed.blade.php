@extends('layouts.rss)

@section('content')
    <item>
        <title>{{ $post->title }}</title>
        <link>{{ action('PostController@show', [$post->id]) }}</link>
        <pubDate>{{ $post->created_at->format('r') }}</pubDate>
        <description><![CDATA[{{ $post->body }}]]></description>
    </item>
@endsection
