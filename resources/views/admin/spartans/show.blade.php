<x-guest-layout>
    <h1 class="font-bold text-xl mb-4 capitalize">{{ $spartan->name }}</h1>

    <div class="mb-4 text-xs text-gray-500">
        {{ $spartan->created_at->diffForHumans() }}
    </div>

    <div class="flex items-center justify-center">
        @if ($spartan->image)
            <img src="{{ Storage::url($spartan->image) }}" alt="{{ $spartan->name }}" class="rounded shadow aspect-auto object-cover object-center">
        @endif
    </div>

    <div class="mt-4">{!! \nl2br($spartan->description) !!}</div>

    <div class="mt-8 flex items-center justify-center">
        <a href="{{ route('spartans.index') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
            Retour à la liste des Spartans
        </a>
    </div>
</x-guest-layout>
