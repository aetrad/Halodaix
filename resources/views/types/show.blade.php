@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $type->name }}</h1>
    <p><strong>Color:</strong> {{ $type->color }}</p>
    @if ($type->image)
        <p><img src="{{ asset('storage/' . $type->image) }}" alt="{{ $type->name }}"></p>
    @endif

    <a href="{{ route('types.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('types.edit', $type->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
