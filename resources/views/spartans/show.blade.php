<x-guest-layout>
    <h1 class="font-bold text-xl mb-4">{{ $spartan->name }}</h1>
    @if ($spartan->image)
        <img src="{{ Storage::url($spartan->image) }}" alt="{{ $spartan->name }}" class="w-full h-48 object-cover rounded-md mb-4">
    @endif
    <div class="mb-4 text-xs text-gray-500">
        PV: {{ $spartan->pv }} | Weight: {{ $spartan->weight }} kg | Height: {{ $spartan->height }} m
    </div>
    <div>
        <!-- Ajoutez ici des informations supplémentaires si nécessaire -->
    </div>
    <a href="{{ route('spartans.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Back to list of Spartans</a>
</x-guest-layout>

