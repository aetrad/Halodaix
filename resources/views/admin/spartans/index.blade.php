@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Liste des Spartans</h1>

    <div class="mt-4">
        <form action="{{ route('admin.spartans.index') }}" method="GET" class="mb-4">
            <div class="flex items-center">
                <input
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Rechercher un Spartan"
                    class="flex-grow border border-gray-300 rounded shadow px-4 py-2 mr-4"
                    value="{{ request()->search }}"
                    autofocus
                />
                <button
                    type="submit"
                    class="bg-white text-gray-600 px-4 py-2 rounded-lg shadow"
                >
                    <x-heroicon-o-magnifying-glass class="h-5 w-5" />
                </button>
            </div>
        </form>

        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.spartans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Ajouter un Spartan
            </a>
        </div>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nom</th>
                    <th class="px-4 py-2">PV</th>
                    <th class="px-4 py-2">Poids</th>
                    <th class="px-4 py-2">Taille</th>
                    <th class="px-4 py-2">Types</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spartans as $spartan)
                    <tr>
                        <td class="border px-4 py-2">{{ $spartan->name }}</td>
                        <td class="border px-4 py-2">{{ $spartan->pv }}</td>
                        <td class="border px-4 py-2">{{ $spartan->weight }}</td>
                        <td class="border px-4 py-2">{{ $spartan->height }}</td>
                        <td class="border px-4 py-2">
                            @foreach ($spartan->types as $type)
                                <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded">{{ $type->name }}</span>
                            @endforeach
                        </td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <a href="{{ route('admin.spartans.edit', $spartan) }}" class="text-blue-500">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.spartans.destroy', $spartan) }}" method="POST" class="inline-block" onsubmit="confirmDeletion(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">
                                    <i class="fas fa-trash"></i>
                                </button>
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
@endsection
