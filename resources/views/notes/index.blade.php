<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">
        <!-- Item 1 -->
        <div class="bg-gray-50 border border-gray-200 rounded p-6">
            <div class="flex">
                <div>
                    <h3 class="text-2xl font-bold">
                        <a href="/id">Title</a>
                    </h3>
                    <div class="text-xl mb-4">Subtitle</div>
                    <ul class="flex">
                        <li
                            class="flex items-center justify-center bg-blue-500 text-white rounded-xl py-1 px-3 mr-2 text-xs">
                            <a href="#">Important</a>
                        </li>
                        <li
                            class="flex items-center justify-center bg-blue-500 text-white rounded-xl py-1 px-3 mr-2 text-xs">
                            <a href="#">School</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>
