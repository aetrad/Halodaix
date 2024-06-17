{{-- resources/views/spartans/index.blade.php --}}

<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-yellow-500 mb-4">Liste des Spartans</h1>

            <form action="{{ route('spartans.index') }}" method="GET" class="mb-4">
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

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($spartans as $spartan)
                <div class="bg-gray-900 rounded-lg shadow-lg overflow-hidden">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $spartan->image) }}')"></div>
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-yellow-500">{{ $spartan->name }}</h2>
                        <p class="text-gray-300 text-sm"><strong>PV:</strong> {{ $spartan->pv }}</p>
                        <p class="text-gray-300 text-sm"><strong>Poids:</strong> {{ $spartan->weight }} kg</p>
                        <p class="text-gray-300 text-sm"><strong>Taille:</strong> {{ $spartan->height }} m</p>
                        <div class="mt-4">
                            <a href="{{ route('spartans.show', $spartan->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">En savoir plus</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $spartans->links() }}
            </div>
        </div>
    </div>
</x-guest-layout>
