<div>
    <a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
    href="{{ route('spartans.show', $spartan) }}">
     <img src="{{ asset('storage/' . $spartan->image) }}" alt="image du Spartan" />
     <div class="uppercase font-bold text-gray-800">{{ $spartan->name }}</div>
     <div class="flex-grow text-gray-700 text-sm text-justify">
         PV: {{ $spartan->pv }}
     </div>
     <div class="flex justify-between items-center">
         <div class="text-sm text-gray-500">
             Poids: {{ $spartan->weight }} kg
         </div>
         <div class="flex items-center space-x-2">
             <x-heroicon-o-chat-bubble-bottom-center-text class="h-5 w-5 text-gray-500" />
             <div class="text-sm text-gray-500">{{ $spartan->comments_count }}</div>
         </div>
     </div>
 </a>
</div>
