@props(['comment'])

<div class="flex gap-5 items-start bg-gray-100 border border-gray-200 p-6 rounded">
    <div>
        <img class="rounded" src="https://i.pravatar.cc/200?u={{ $comment->id }}" alt="{{ $comment->author->username }} profile picture" width="200">
    </div>

    <div>
        <p class="font-bold">{{ $comment->author->username }}</p>

        <p class="text-xs">
            Posted
            <time>
                {{ $comment->created_at->diffForHumans() }}
            </time>
        </p>

        <p class="mt-5">
            {{ $comment->body }}
        </p>
    </div>
</div>