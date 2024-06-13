<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une Attaque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form action="{{ route('attacks.update', $attack->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ $attack->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="damage" class="block text-sm font-medium text-gray-700">Dégâts</label>
                            <input type="number" name="damage" id="damage" class="mt-1 block w-full" value="{{ $attack->damage }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="mt-1 block w-full" rows="4" required>{{ $attack->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="type_id" class="block text-sm font-medium text-gray-700">Type</label>
                            <select name="type_id" id="type_id" class="mt-1 block w-full">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ $attack->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
