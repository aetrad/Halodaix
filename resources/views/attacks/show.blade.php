@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $attack->name }}</h1>
    <p><strong>Damage:</strong> {{ $attack->damage }}</p>
    <p><strong>Description:</strong> {{ $attack->description }}</p>
    <p><strong>Type:</strong> {{ $attack->type->name }}</p>
    @if ($attack->image)
        <p><img src="{{ asset('storage/' . $attack->image) }}" alt="{{ $attack->name }}"></p>
    @endif

    <a href="{{ route('attacks.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('attacks.edit', $attack->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('attacks.destroy', $attack->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
