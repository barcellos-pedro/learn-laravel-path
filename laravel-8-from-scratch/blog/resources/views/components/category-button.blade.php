@props(['category'])

<a href="?category={{ $category->slug }}" title="See all {{ $category->name }} posts" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" style="font-size: 10px">
    {{ $category->name }}
</a>