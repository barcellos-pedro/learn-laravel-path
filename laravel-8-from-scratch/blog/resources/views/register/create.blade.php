<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-semibold text-2xl">Register</h1>

            <form action="/register" method="POST">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700" for="name">Name</label>
                    <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full rounded" required maxlength="255">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700" for="username">Username</label>
                    <input type="text" name="username" id="username" class="border border-gray-400 p-2 w-full rounded" required minlength="3" maxlength="255">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700" for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full rounded" required maxlength="255">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700" for="password">Password</label>
                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full rounded" required minlength="7" maxlength="255">
                </div>

                <button type="submit" class="bg-blue-500 px-6 py-2 text-white rounded">
                    Register
                </button>
            </form>
        </main>
    </section>
</x-layout>