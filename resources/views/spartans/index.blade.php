<x-guest-layout>
    <h1 class="font-bold text-xl mb-4 text-haloYellow">Liste des Spartans</h1>
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        @foreach ($spartans as $spartan)
            <li>
                <x-spartan-card :spartan="$spartan" />
            </li>
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $spartans->links() }}
    </div>
</x-guest-layout>

