<x-layout>
    <article>
        <h1> {{$post->title; }}</h1>

        <h4>
            By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{$post->category->slug}}"> {{ $post->category->name }} </a>
        </h4>

        {!! $post->body !!}
    
    </article>
    
    <a href="/">Go back</a>
</x-layout>
