<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($categories->count())
        <h1 class="text-center text-3xl text-blue-500 font-semibold">
            Categories
        </h1>

        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($categories as $category)
            <x-category-button :category="$category"></x-category-button>
            @endforeach
        </div>

        @else
        <p class="text-center text-2xl">
            No categories yet. Please check back later.
        </p>
        @endif
    </main>
</x-layout>