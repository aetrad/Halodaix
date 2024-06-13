@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Halodaix</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($spartans as $spartan)
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-bold">{{ $spartan->name }}</h2>
                <p>PV: {{ $spartan->pv }}</p>
                <p>Weight: {{ $spartan->weight }} kg</p>
                <p>Height: {{ $spartan->height }} m</p>
                <a href="{{ route('spartans.show', $spartan->id) }}" class="text-blue-500 hover:underline">View Details</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
