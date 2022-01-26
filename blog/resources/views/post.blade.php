{{-- @extends('layout')
@section('content')
<article>
    <h1> {{$post->title; }}</h1>
   {!! $post->body !!}

</article>

<a href="/">Go back</a>
@endsection --}}

<x-layout>
    <article>
        <h1> {{$post->title; }}</h1>
       {!! $post->body !!}
    
    </article>
    
    <a href="/">Go back</a>
</x-layout>
