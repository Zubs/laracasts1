<html>
    <head>
        <title>Testing</title>
    </head>
    <body>
        @foreach($posts as $post)
            <h1>
                <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
            </h1>
            {!! $post->excerpt !!}
            <pre>
                {{ $post }}
            </pre>
{{--            <p>Posted {{ $post->created_at->diffForHumans() }} by {{ $post->author->name }}</p>--}}
        @endforeach
    </body>
</html>
