<x-layout>
    <div class="mx-4">
        <x-card class="p-10 max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
                <p class="mb-4">Create an account to post notes</p>
            </header>

            <form method="POST" action="/users">
                <div class="mb-6">
                    <label for="username" class="inline-block text-lg mb-2">Username</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="username" />
                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">Password</label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                </div>

                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">Confirm Password</label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password2" />
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-black">
                        Sign Up
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Already have an account?
                        <a href="/login" class="text-blue-500 hover:underline">Login</a>
                    </p>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
