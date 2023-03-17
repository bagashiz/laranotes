@props(['note'])

<x-card>
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                <a href="/notes/{{ $note->id }}">{{ $note->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $note->subtitle }}</div>
            <x-note-tags :tags="$note->tags" />
        </div>
    </div>
</x-card>
