@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Liste des Types</h1>

    <div class="mt-4">
        <form action="{{ route('admin.types.index') }}" method="GET" class="mb-4">
            <div class="flex items-center">
                <input
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Rechercher un Type"
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
            <a href="{{ route('admin.types.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Ajouter un Type
            </a>
        </div>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nom</th>
                    <th class="px-4 py-2">Couleur</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td class="border px-4 py-2">{{ $type->name }}</td>
                        <td class="border px-4 py-2">{{ $type->color }}</td>
                        <td class="border px-4 py-2 flex">
                            <a href="{{ route('admin.types.edit', $type) }}" class="text-blue-500 mr-2">
                                <x-heroicon-o-pencil class="w-5 h-5" />
                            </a>
                            <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce type ? Cette action est irréversible.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">
                                    <x-heroicon-o-trash class="w-5 h-5" />
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $types->links() }}
        </div>
    </div>
@endsection
