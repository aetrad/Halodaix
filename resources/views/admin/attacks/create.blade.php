@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Ajouter une Attaque</h1>

    <form action="{{ route('admin.attacks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nom</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="damage" class="block text-gray-700">Dégâts</label>
            <input type="number" name="damage" id="damage" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full"></textarea>
        </div>

        <div class="mb-4">
            <label for="type_id" class="block text-gray-700">Type</label>
            <select name="type_id" id="type_id" class="mt-1 block w-full">
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
        </div>
    </form>
@endsection
