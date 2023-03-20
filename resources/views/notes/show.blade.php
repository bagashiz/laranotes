<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-between justify-between text-between">
                <h3 class="text-2xl font-bold mb-2">{{ $note->title }}</h3>
                <div class="text-xl mb-4">{{ $note->subtitle }}</div>
                <x-note-tags :tags="$note->tags" />
                <div class="border border-gray-200 w-full mt-4 mb-6"></div>
                <div>
                    <div class="text-lg space-y-6">
                        <p>
                            {{ $note->description }}
                        </p>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>
