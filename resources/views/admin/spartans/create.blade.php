@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Créer Spartan</h1>

    <form action="{{ route('admin.spartans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="pv" class="block text-gray-700">PV</label>
            <input type="number" name="pv" id="pv" value="{{ old('pv') }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="weight" class="block text-gray-700">Poids</label>
            <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight') }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="height" class="block text-gray-700">Taille</label>
            <input type="number" step="0.01" name="height" id="height" value="{{ old('height') }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="types" class="block text-gray-700">Types</label>
            <select name="types[]" id="types" class="mt-1 block w-full" multiple>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer</button>
        </div>
    </form>
@endsection
