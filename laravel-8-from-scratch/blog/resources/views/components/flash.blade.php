@if(session()->has('success'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
    <p class="fixed right-3 bottom-3 bg-blue-500 text-white px-4 py-3 rounded">
        {{ session('success') }}
    </p>
</div>
@endif