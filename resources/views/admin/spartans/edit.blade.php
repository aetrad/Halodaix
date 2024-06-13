<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un Spartan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form action="{{ route('spartans.update', $spartan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ $spartan->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="pv" class="block text-sm font-medium text-gray-700">PV</label>
                            <input type="number" name="pv" id="pv" class="mt-1 block w-full" value="{{ $spartan->pv }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="weight" class="block text-sm font-medium text-gray-700">Poids</label>
                            <input type="number" name="weight" id="weight" class="mt-1 block w-full" value="{{ $spartan->weight }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="height" class="block text-sm font-medium text-gray-700">Taille</label>
                            <input type="number" name="height" id="height" class="mt-1 block w-full" value="{{ $spartan->height }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full">
                            @if ($spartan->image)
                                <img src="{{ Storage::url($spartan->image) }}" alt="{{ $spartan->name }}" class="mt-2 w-32 h-32 object-cover rounded-md">
                            @endif
                        </div>
                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
