<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Spartans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-between mt-8">
                        <div class=" text-2xl">
                            Liste des Spartans
                        </div>
                        <div class="flex items-center justify-center space-x-8">
                            <a href="{{ route('spartans.create') }}"
                                class="text-gray-500 font-bold py-2 px-4 rounded hover:bg-gray-200 transition">Ajouter un Spartan</a>
                        </div>
                    </div>
                    <div class="mt-6 text-gray-500">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="uppercase text-left">
                                    <th class="px-4 py-2 border">Nom</th>
                                    <th class="px-4 py-2 border">PV</th>
                                    <th class="px-4 py-2 border">Poids</th>
                                    <th class="px-4 py-2 border">Taille</th>
                                    <th class="px-4 py-2 border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spartans as $spartan)
                                    <tr class="hover:bg-gray-50 odd:bg-gray-100 hover:odd:bg-gray-200 transition">
                                        <td class="border px-4 py-2">{{ $spartan->name }}</td>
                                        <td class="border px-4 py-2">{{ $spartan->pv }}</td>
                                        <td class="border px-4 py-2">{{ $spartan->weight }}</td>
                                        <td class="border px-4 py-2">{{ $spartan->height }}</td>
                                        <td class="border px-4 py-2 space-x-4">
                                            <a href="{{ route('spartans.edit', $spartan->id) }}"
                                                class="text-blue-400">Edit</a>
                                            <form action="{{ route('spartans.destroy', $spartan->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $spartans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
