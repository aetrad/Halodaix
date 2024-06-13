<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un Type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form action="{{ route('types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ $type->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="color" class="block text-sm font-medium text-gray-700">Couleur</label>
                            <input type="text" name="color" id="color" class="mt-1 block w-full" value="{{ $type->color }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full">
                            @if ($type->image)
                                <img src="{{ Storage::url($type->image) }}" alt="{{ $type->name }}" class="mt-2 w-32 h-32 object-cover rounded-md">
                            @endif
                        </div>
                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
