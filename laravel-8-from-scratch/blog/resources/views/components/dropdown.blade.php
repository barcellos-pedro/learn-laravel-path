<div x-data="{ show: false }" @click.outside="show = false" @keyup.escape="show = false" class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
    {{-- Trigger --}}
    <div @click="show = !show" class="w-full">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="max-h-52 overflow-auto py-3 absolute z-10 top-10 bg-gray-100 w-full lg:w-44" style="display: none;">
        {{ $slot }}
    </div>
</div>