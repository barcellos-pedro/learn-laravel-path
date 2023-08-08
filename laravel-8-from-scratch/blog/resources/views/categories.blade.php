<h1>Categories</h1>

@foreach ($categories as $category)
<a  href="/categories/{{ $category->slug }}" 
    title="See all {{ $category->name }} posts" 
    style="display:block; margin: 1em 0; font-size:1.5em">
    {{ $category->name }}
</a>
@endforeach

<a href="/">Go back</a>