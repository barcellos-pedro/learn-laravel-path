<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <x-category-dropdown />

        <!-- Other Filters -->
        <!-- <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold cursor-pointer">
                <option value="category" disabled selected>Other Filters
                </option>
                <option value="foo">Foo
                </option>
                <option value="bar">Bar
                </option>
            </select>

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"></x-icon>
        </div> -->

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/" class="w-full">
                <input type="search" name="search" placeholder="Find something" class="w-full bg-transparent placeholder-black font-semibold text-sm" value="{{ request('search') }}">

                @if (request('category'))
                <input type="hidden" name="category" aria-hidden="true" value="{{ request('category') }}">
                @endif
            </form>
        </div>

    </div>

    @if (request('search'))
    <p class="mt-6 text-3xl font-semibold">
        {{ $posts->count() }} results for "{{ request('search') }}"
    </p>
    @endif
</header>