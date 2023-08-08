<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>

        <a href="/categories/{{ $post->category->slug }}">
            {{ $post->category->name }}
        </a>

        <p>{{ $post->body }}</p>
    </article>

    <a href="/">Go back</a>
</x-layout>