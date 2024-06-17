@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Liste des Attaques</h1>

    <div class="mt-4">
        <form action="{{ route('admin.attacks.index') }}" method="GET" class="mb-4">
            <div class="flex items-center">
                <input
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Rechercher une Attaque"
                    class="flex-grow border border-gray-300 rounded shadow px-4 py-2 mr-4"
                    value="{{ request()->search }}"
                    autofocus
                />
                <button
                    type="submit"
                    class="bg-white text-gray-600 px-4 py-2 rounded-lg shadow"
                >
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.attacks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Ajouter une Attaque
            </a>
        </div>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nom</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attacks as $attack)
                    <tr>
                        <td class="border px-4 py-2">{{ $attack->name }}</td>
                        <td class="border px-4 py-2">{{ $attack->description }}</td>
                        <td class="border px-4 py-2">{{ $attack->type->name }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.attacks.edit', $attack) }}" class="text-blue-500">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.attacks.destroy', $attack) }}" method="POST" class="inline-block">
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
            {{ $attacks->links() }}
        </div>
    </div>
@endsection
