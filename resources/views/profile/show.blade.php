<!-- resources/views/profile/show.blade.php -->

<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <div class="flex items-center">
                <x-avatar class="h-20 w-20" :user="$user" />
                <div class="ml-4 flex flex-col">
                    <div class="text-gray-300 font-bold">{{ $user->name }}</div>
                    <div class="text-gray-300 text-sm">{{ $user->email }}</div>
                    <div class="text-gray-500 text-xs">Rôle: {{ $user->role->name }}</div>
                    <div class="text-gray-500 text-xs">Membre depuis {{ $user->created_at->diffForHumans() }}</div>
                </div>
            </div>

            <div class="mt-8">
                <h2 class="text-2xl font-bold text-yellow-500 mb-4">Spartans</h2>
                <ul class="grid sm:grid-cols-2 gap-8">
                    @forelse ($spartans as $spartan)
                        <li>
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
                        </li>
                    @empty
                        <div class="text-gray-300">Aucun Spartan</div>
                    @endforelse
                </ul>
            </div>

            <div class="mt-8">
                <h2 class="text-2xl font-bold text-yellow-500 mb-4">Commentaires</h2>
                <div class="flex-col space-y-4">
                    @forelse ($comments as $comment)
                        <div class="flex bg-gray-900 rounded-md shadow p-4 space-x-4">
                            <div class="flex justify-start items-start h-full">
                                <x-avatar class="h-10 w-10" :user="$comment->user" />
                            </div>
                            <div class="flex flex-col justify-center w-full space-y-4">
                                <div class="flex justify-between">
                                    <div class="flex space-x-4 items-center justify-center">
                                        <div class="flex flex-col justify-center">
                                            <div class="text-gray-300">{{ $comment->user->name }}</div>
                                            <div class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                    @can('delete', $comment)
                                        <div class="flex justify-center">
                                            <button x-data="{ id: {{ $comment->id }} }" x-on:click.prevent="window.selected = id; $dispatch('open-modal', 'confirm-comment-deletion');" type="submit" class="font-bold bg-gray-700 text-gray-300 px-4 py-2 rounded shadow">
                                                <x-heroicon-o-trash class="h-5 w-5" />
                                            </button>
                                        </div>
                                    @endcan
                                </div>
                                <div class="flex flex-col justify-center w-full text-gray-300">
                                    <p class="border bg-gray-800 rounded-md p-4">{{ $comment->body }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex bg-gray-900 rounded-md shadow p-4 space-x-4 text-gray-300">Aucun commentaire pour l'instant</div>
                    @endforelse
                </div>

                <x-modal name="confirm-comment-deletion" focusable>
                    <form method="post" onsubmit="event.target.action= '/spartans/{{ $spartan->id ?? 1 }}/comments/' + window.selected" class="p-6">
                        @csrf @method('DELETE')
                        <h2 class="text-lg font-medium text-gray-300">Êtes-vous sûr de vouloir supprimer ce commentaire ?</h2>
                        <p class="mt-1 text-sm text-gray-500">Cette action est irréversible. Toutes les données seront supprimées.</p>
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">Annuler</x-secondary-button>
                            <x-danger-button class="ml-3" type="submit">Supprimer</x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </div>
        </div>
    </div>
</x-guest-layout>
