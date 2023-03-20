<x-layout>
    @include('partials._hero')
    @include('partials._search')

    @unless(count($notes) == 0)
        <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($notes as $note)
                <x-note-card :note="$note" />
            @endforeach
        </div>

        <div class="mt-6 p-4">
            {{ $notes->links() }}
        </div>
    @else
        @if (auth()->check())
            <div class="flex flex-col items-center justify-center h-64">
                <p class="text-2xl font-bold text-gray-699 mb-2">No notes found!</p>
                <p class="text-gray-500">Looks like you have not create any notes.</p>
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-64">
                <p class="text-2xl font-bold text-gray-700 mb-2">Welcome to LaraNotes!</p>
                <p class="text-gray-500">Please log in to start creating and managing your notes.</p>
            </div>
        @endif
    @endunless
</x-layout>
