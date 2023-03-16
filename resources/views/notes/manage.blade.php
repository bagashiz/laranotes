<x-layout>
    <div class="mx-4">
        <x-card class="p-10">
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Manage Notes
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="/notes">
                                Title
                            </a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="/notes/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <form method="POST" action="/notes">
                                <button class="text-red-600">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </x-card>
    </div>
</x-layout>
