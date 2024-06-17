@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Éditer Spartan</h1>

    <form action="{{ route('admin.spartans.update', $spartan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nom</label>
            <input type="text" name="name" id="name" value="{{ $spartan->name }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="pv" class="block text-gray-700">PV</label>
            <input type="number" name="pv" id="pv" value="{{ $spartan->pv }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="weight" class="block text-gray-700">Poids</label>
            <input type="number" step="0.1" name="weight" id="weight" value="{{ $spartan->weight }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="height" class="block text-gray-700">Taille</label>
            <input type="number" step="0.01" name="height" id="height" value="{{ $spartan->height }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
            @if ($spartan->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $spartan->image) }}" alt="Spartan Image" class="h-32 w-32 object-cover">
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label for="types" class="block text-gray-700">Types</label>
            <select name="types[]" id="types" multiple class="mt-1 block w-full">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ in_array($type->id, $spartan->types->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </div>
    </form>
@endsection
