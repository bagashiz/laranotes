<x-layout>
    <div class="mx-4">
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create Note
                </h2>
                <p class="mb-4">Create a new note</p>
            </header>

            <form method="POST" action="/notes">
                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        placeholder="Example: Math Homework" value="Math Homework" />
                </div>

                <div class="mb-6">
                    <label for="subtitle" class="inline-block text-lg mb-2">Subtitle</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                        value="Algebra" />
                </div>

                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Comma Separated)
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                        placeholder="Example: Important, School, etc." value="Important, School" />
                </div>

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        Note
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                        placeholder="Write something here...">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid facere ea odit debitis velit, hic obcaecati voluptate nobis eveniet. Ipsam libero voluptatibus iste fugiat labore suscipit veritatis autem amet ut.</textarea>
                </div>

                <div class="mb-6 flex justify-between">
                    <button class="bg-gray-500 text-white rounded py-2 px-4 hover:bg-gray-600 text-lg">
                        <a href="/">Cancel</a>
                    </button>

                    <button class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600 text-lg">
                        Create
                    </button>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
