@props(['comments'])

<section class="col-span-8 col-start-5 grid grid-cols-1 gap-6">
    @if($comments->count())

    @foreach($comments as $comment)
    <x-post-comment :comment="$comment" />
    @endforeach

    @else
    <p class="text-center text-xl font-semibold">
        No comments yet
    </p>
    @endif
</section>