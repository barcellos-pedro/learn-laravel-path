<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>

        <!-- Do not scape the content -->
        <p>{!! $post->body !!}</p>
    </article>

    <a href="/">Go back</a>
</x-layout>
