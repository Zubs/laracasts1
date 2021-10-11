@props(['posts'])

<x-post-featured-card :post="$posts[0]"></x-post-featured-card>

@if($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(0) as $post)
            <x-post-card class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" :post="$post"></x-post-card>
        @endforeach
    </div>
@endif
