<!-- resources/views/spartans/show.blade.php -->

<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <div class="flex flex-col md:flex-row items-center md:items-start">
                <div class="md:w-1/3">
                    <img class="w-full h-auto rounded-lg shadow-lg" src="{{ asset('storage/' . $spartan->image) }}" alt="Spartan Image">
                </div>
                <div class="md:w-2/3 md:ml-8 mt-4 md:mt-0">
                    <h2 class="text-3xl font-bold text-yellow-500 mb-4">{{ $spartan->name }}</h2>
                    <p class="text-gray-300 text-lg mb-2"><strong>PV:</strong> {{ $spartan->pv }}</p>
                    <p class="text-gray-300 text-lg mb-2"><strong>Poids:</strong> {{ $spartan->weight }} kg</p>
                    <p class="text-gray-300 text-lg mb-4"><strong>Taille:</strong> {{ $spartan->height }} m</p>
                    <div class="flex items-center mt-4">
                        <a href="{{ route('spartans.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Back to list of Spartans</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg mt-8">
            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Commentaires</h2>
            <div class="flex-col space-y-4">
                @forelse ($spartan->comments as $comment)
                    <div class="flex bg-gray-900 rounded-md shadow p-4 space-x-4">
                        <a href="{{ route('profile.show', $comment->user) }}" class="flex justify-start items-start h-full">
                            <x-avatar class="h-10 w-10" :user="$comment->user" />
                        </a>
                        <div class="flex flex-col justify-center w-full space-y-2">
                            <div class="flex justify-between items-center">
                                <a href="{{ route('profile.show', $comment->user) }}" class="text-gray-300">
                                    <span class="font-bold">{{ $comment->user->name }}</span>
                                    <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                </a>
                                @can('delete', $comment)
                                <form method="POST" action="{{ route('spartans.comments.delete', [$spartan, $comment]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Supprimer</button>
                                </form>
                                @endcan
                            </div>
                            <div class="text-gray-300">
                                {{ $comment->body }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-900 rounded-md shadow p-4 text-gray-300">
                        Aucun commentaire pour l'instant.
                    </div>
                @endforelse

                @auth
                <form action="{{ route('spartans.comments.add', $spartan) }}" method="POST" class="bg-gray-900 rounded-md shadow p-4 mt-4">
                    @csrf
                    <div class="flex justify-start items-start h-full mb-4">
                        <x-avatar class="h-10 w-10" :user="auth()->user()" />
                    </div>
                    <div class="flex flex-col justify-center w-full">
                        <textarea name="body" id="body" rows="4" placeholder="Votre commentaire" class="w-full rounded-md shadow-sm border-gray-300 bg-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        <div class="mt-2 flex justify-end">
                            <button type="submit" class="font-bold bg-blue-500 text-white px-4 py-2 rounded shadow">Ajouter un commentaire</button>
                        </div>
                    </div>
                </form>
                @else
                <div class="bg-gray-900 rounded-md shadow p-4 text-gray-300 flex justify-between items-center mt-4">
                    <span> Vous devez être connecté pour ajouter un commentaire </span>
                    <a href="{{ route('login') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow-md">Se connecter</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</x-guest-layout>
