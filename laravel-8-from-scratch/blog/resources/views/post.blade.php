<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>
        <p>Category: {{ $post->category->name }}</p>
        <p>{{ $post->body }}</p>
    </article>

    <a href="/">Go back</a>
</x-layout>