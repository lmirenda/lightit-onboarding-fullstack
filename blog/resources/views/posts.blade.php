<x-layout>
    @foreach ($posts as $post)
        <article>
            
            <h1>
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
            </h1>

            <h4>
                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{$post->category->slug}}"> {{ $post->category->name }} </a>
            </h4>
            
            {!! $post->excerpt !!}
            
        </article>
    @endforeach
</x-layout>