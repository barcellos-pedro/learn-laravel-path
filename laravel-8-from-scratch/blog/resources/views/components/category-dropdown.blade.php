<x-dropdown>
    <x-slot name="trigger">
        <button type="button" class="w-full inline-flex appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
            {{ $currentCategory->name ?? 'Categories'}}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"></x-icon>
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home') && empty(request()->query())">
        All
    </x-dropdown-item>

    @foreach ($categories as $category)
    <x-dropdown-item href="?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}" :active="(request()->query()['category'] ?? false) === $category->slug">
        {{ ucwords($category->name) }}
    </x-dropdown-item>
    @endforeach
</x-dropdown>