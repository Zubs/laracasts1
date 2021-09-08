<html>
    <head>
        <title>Testing</title>
    </head>
    <body>
        @foreach($posts as $post)
            <h1>
                <a href="/post/{{ $post['slug'] }}">{{ $post['title'] }}</a>
            </h1>
            {!! $post['excerpt'] !!}
            <p>{{ $post['date'] }}</p>
        @endforeach
    </body>
</html>
