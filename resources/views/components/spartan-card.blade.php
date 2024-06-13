<div>
    <a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
    href="{{ route('spartans.show', $spartan) }}">
    @if ($spartan->image)
        <img src="{{ Storage::url($spartan->image) }}" alt="{{ $spartan->name }}" class="w-full h-48 object-cover rounded-md">
    @endif
    <div class="uppercase font-bold text-gray-800">
        {{ $spartan->name }}
    </div>
    <div class="flex-grow text-gray-700 text-sm text-justify">
        PV: {{ $spartan->pv }} | Weight: {{ $spartan->weight }} kg | Height: {{ $spartan->height }} m
    </div>
    </a>
</div>
