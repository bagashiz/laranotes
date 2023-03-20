<x-layout>
    <div class="mx-4">
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Note
                </h2>
                <p class="mb-4">Edit: {{ $note->title }}</p>
            </header>

            <form method="POST" action="/notes/{{ $note->id }}">
                @csrf
                @method('PATCH')
                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        placeholder="Example: Math Homework" value="{{ $note->title }}" />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="subtitle" class="inline-block text-lg mb-2">Subtitle</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="subtitle"
                        value="{{ $note->subtitle }}" />
                    @error('subtitle')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Comma Separated)
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                        placeholder="Example: Important,School, etc." value="{{ $note->tags }}" />
                    @error('tags')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        Note
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                        placeholder="Write something here...">{{ $note->description }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 flex justify-between">
                    <button class="bg-gray-500 text-white rounded py-2 px-4 hover:bg-gray-600 text-lg">
                        <a href="/notes/manage">Cancel</a>
                    </button>

                    <button class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600 text-lg">
                        Update
                    </button>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
